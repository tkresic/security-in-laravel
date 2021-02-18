@extends('layouts.app')
@section('content')
    <div class="row justify-content-center my-5 mx-0">
        @if (count($errors) > 0)
            <div class="col-8 alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        <div class="col-6">
            <h3>Primjer XSS napada</h3>
            <br>
            <h6 class="font-weight-bold">Opis</h6>
            <p>
                XSS je tip malicioznog napada gdje napadač ubrizgava skriptni kod u web
                stranicu preko poslužiteljske strane i taj se kod onda izvršava kada korisnik
                otvori tu istu stranicu koja bi inače bila bezopasna.
                Ovakav tip napada se javlja kada web stranica koristi loše validirani sadržaj
                koji korisnik unese na web stranici te ga onda kasnije prikazuje na svojim stranicama.
                Isto tako, ovim napadom napadač ne napada metu direktno već koristi cijelu
                web stranicu kao sredstvo za isporučavanje zloćudne skripte
            </p>
            <h6 class="font-weight-bold">Problem</h6>
            <p>
                Pošto je u pogledu sadržaj komentara unesen sa <i>&#123;!!  !!&#125;</i> oznakama,
                sadržaj komentara ne prolazi kroz PHP-ovu <i>htmlspecialchars()</i> funkciju
                i učitava se kao skripta, a ne kao komentar.
            </p>
            <h6 class="font-weight-bold">Rješenje</h6>
            <p>
                Koristiti PHP-ove <i>&#123;&#123;  &#125;&#125;</i> oznake tako da sav sadržaj komentara prođe
                kroz <i>htmlspecialchars()</i> metodu i da se na taj način sanitira "<" i ">" znakova.
            </p>
            <form action="{{ route('storeComment') }}" method="POST">
                @csrf
                <div>
                    <h3>Novi komentar</h3>
                </div>
                <div class="form-group">
                    <label for="title">Naslov</label>
                    <input type="text" class="form-control" name="title"
                           placeholder="Unesite naslov">
                </div>
                <div class="form-group">
                    <label for="content">Sadržaj</label>
                    <textarea class="form-control richTextBox" placeholder="Unesite komentar" name="content" style="resize: none;"></textarea>
                    <small>
                        Primjerice, ako se u komentar unese tekst "{{ "<script>alert('XSS napad');</script>" }}"
                        za svakog korisnika, svaki put će se izvršit ta skripta pri otvaranju stranice sa komentarima.
                    </small>
                </div>
                <button type="submit" class="btn btn-primary save">Komentiraj</button>
            </form>
        </div>
    </div>
    <div class="row justify-content-center my-5 mx-0">
        <div class="col-6">
            <h3>Komentari ({{ count($posts) }})</h3>
            @if(count($posts) != 0)
                @foreach($posts as $post)
                    <h5 class="mt-4">
                        {{ $post->title }}
                    </h5>
                    <!--
                        Nezaštićen output
                        Primjerice, ako se u komentar unese tekst: <script>alert('XSS napad');</script>
                        za svakog korisnika će se izvršit ta skripta pri otvaranju stranice sa komentarima.
                        Naravno, ovo je jednostavan primjer, ali prikazuje moć XSS napada i što je sve moguće sa njim.
                    -->
                    <p>
                        {!! $post->content  !!}
                    </p>
                    <!--
                        Zaštićen output
                    <p>
                        {{ $post->content }}
                    </p>
                    -->
                @endforeach
            @endif
        </div>
    </div>
@endsection