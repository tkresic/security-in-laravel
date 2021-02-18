@extends('layouts.app')
@section('content')
    <div class="row justify-content-center my-5 mx-0">
        <div class="col-6">
            <h3>Primjer CSRF napada</h3>
            <br>
            <h6 class="font-weight-bold">Opis</h6>
            <p>
                CSRF je tip zloćudnog napada na određenu web stranicu u kojem se iskorištava
                povjerenje korisnika u njegov web preglednik. Zapravo se radi o neautoriziranim
                komandama koje se najčešće nalaze u JavaScript skriptama.
            </p>
            <h6 class="font-weight-bold">Problem</h6>
            <p>
                Forma predstavlja zamišljenu igru gdje se može prebaciti virtualna valuta (zlato)
                drugim korisnicima. Laravelov međusoftver automatski traži CSRF token pri predavanju forme,
                no to se može isključiti jer nije uvijek potrebno.
                Dakle, ako je korisnik ulogiran u web aplikaciju, i sa neke druge stranice
                klikne link koji će imati istu rutu kao ova forma
                i u inputima upisano ime korisnika i iznos zlata, taj će se zahtjev izvršit ako nije
                uključen CSRF token u formu.
            </p>
            <h6 class="font-weight-bold">Rješenje</h6>
            <p>
                Uključivanje CSRF tokena u formu tako da <i>VerifyCsrfToken</i> međusoftver može pronaći
                token i dopustiti zahtjevu da prođe. Ako se ne uključi CSRF token, Laravel će automatski dat
                izvještaj greške da je sesija istekla.
            </p>
            <form action="{{ route('transferGold') }}" method="POST">
                {{--@csrf--}}
                <div>
                    <h3>Prijenos zlata</h3>
                </div>
                <div class="form-group">
                    <label for="username">Korisničko ime</label>
                    <input type="text" class="form-control" name="username"
                           placeholder="Unesite korisničko ime">
                </div>
                <div class="form-group">
                    <label for="amount">Iznos</label>
                    <input type="number" class="form-control" placeholder="Unesite iznos zlata" name="amount">
                </div>
                <button type="submit" class="btn btn-primary save">Prenesi zlato</button>
            </form>
        </div>
    </div>
@endsection