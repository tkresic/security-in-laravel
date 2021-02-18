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
            <h3>Primjer SQL napada</h3>
            <br>
            <h6 class="font-weight-bold">Opis</h6>
            <p>
                SQL ubrizgavanje je tehnika ubrizgavanja koda gdje se pomoću SQL upita
                pokušava doći do bilo kakve vrste podataka pohranjenih u bazi podataka,
                promijeniti iste i/ili čak izbrisati podatke. Funkcionira na način da se
                umjesto očekivanih podataka poput korisničkog imena korisnika kod login
                forme preda SQL upit koji se zatim dalje šalje SQL serveru za izvršavanje.
                <br>
            </p>
            <h6 class="font-weight-bold">Problem</h6>
            <p>
                Recimo da imamo formu za pretraživanje korisnika na <i>web</i> aplikaciji.
                Ukoliko predana forma ne sanitira svoje parametre, može se dogoditi da se
                lukavim SQL upitom dođe do korisnika iako su upisani krivi podaci.
            </p>
            <h6 class="font-weight-bold">Rješenje</h6>
            <p>
                Koristiti Laravelov ugrađenju PDO knjižnicu koja je uključena kada se koristi Laravelov
                Eloquent nad modelima. Isto tako, bilo bi dobro da se sanitira svaki predani parametar
                zasebno i provjeri da li je on tipa kojeg se očekuje da bude.
            </p>
            <h6 class="font-weight-bold">Upute</h6>
            <p>
                Korisnik koji već postoji je registriran sa e-mailom: 'tonikresic1997@gmail.com'.
                Ako upišemo taj e-mail, vratit će nam tog korisnika. Ako upišemo bilo koji drugi mail, neće
                nam vratit ništa jer je samo jedan korisnik registriran. No, ako ubrizgamo SQL kod možemo
                vratit sve korisnike koji su registrirani.
            </p>
            <form action="{{ route('retrieveUsers') }}" method="POST">
                @csrf
                <div>
                    <h3>Traži</h3>
                </div>
                <div class="form-group">
                    <label for="email">Email</label>
                    <input type="text" class="form-control" name="email"
                           placeholder="Unesite e-mail" required>
                    <small>
                        Primjerice, ako se u komentar unese tekst: bilokakavtekst' OR 'a' = 'a
                        SQL upit će bit <i>true</i> i vratit će nam sve korisnike.
                    </small>
                </div>
                <button type="submit" class="btn btn-primary save">Pretraži</button>
            </form>
        </div>
    </div>

    <div class="row justify-content-center my-5 mx-0">
        <div class="col-6">
            @if($user)
                <h4>Pronađen korisnik!</h4>
                <p class="mt-4">
                    Ime: {{ $user[0]->name }}
                    <br>
                    E-mail: {{ $user[0]->email }}
                </p>
            @else
                <h4>Tražilica</h4>
            @endif
        </div>
    </div>

@endsection