@extends('layouts.app')
@section('content')
    <div class="row justify-content-center my-5 mx-0">
        <div class="col-4 text-left">
            <h3>Primjer izvještaja greške</h3>
            <br>
            <h6 class="font-weight-bold">Opis</h6>
            <p>
                Izvještaji grešaka su zapisi koji pobliže daju do znanja gdje se
                dogodila greška u kodu i zašto je do te greške došlo.
            </p>
            <h6 class="font-weight-bold">Problem</h6>
            <p>
                Sljedeći link vodi na novi pogled. Pošto je u upravljačkom dijelu
                <i>ErrorReportingController.php</i> nastala sintaksna greška, te je u <i>.env</i>
                datoteci vrijednost varijable <i>APP_DEBUG</i> postavljena na <i>true</i>,
                prikazat će se izvještaj koji pokazuje gdje je u kodu nastala greška.
            </p>
            <h6 class="font-weight-bold">Rješenje</h6>
            <p>
                Staviti vrijednost varijable <i>APP_DEBUG</i> na <i>false</i>
                i restartirati server. Nakon toga, ne prikazuje se izvještaj greške već laravel
                nas obavještava da je nešto pošlo po krivu bez otkrivanja dijelova koda.
            </p>
            <a href="{{ url('error-reporting') }}" class="btn btn-primary">Testiraj grešku</a>
        </div>
    </div>
@endsection