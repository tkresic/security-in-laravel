@extends('layouts.app')

@section('css')

    <style>
        html, body {
            background-color: #fff;
            color: #636b6f;
            font-family: 'Raleway', sans-serif;
            font-weight: 100;
            height: 100vh;
            margin: 0;
        }

        .max-height {
            height: calc(100vh - 55px);
        }

        .title {
            font-size: 84px;
            color: #c1c8d3;
        }

        .links > a {
            color: #636b6f;
            padding: 0 25px;
            font-size: 12px;
            font-weight: 600;
            letter-spacing: .1rem;
            text-decoration: none;
            text-transform: uppercase;
        }

    </style>

@endsection

@section('content')

    <div class="row justify-content-center max-height mx-0">

        <div class="col-auto align-self-center text-center">

            <div class="title">
                Sigurnost u Laravelu
            </div>

            <div class="links">

                <a href="{{ url('security/csrf') }}">CSRF napad</a>
                <a href="{{ url('security/xss') }}">XSS napad</a>
                <a href="{{ url('security/error-reporting') }}">Izvještaji grešaka</a>
                <a href="{{ url('security/sql') }}">SQL ubrizgavanje</a>
                <a href="{{ url('security/hashing') }}">Sažimanje</a>
                <a href="{{ url('security/encryption') }}">Enkripcija</a>
                <a href="{{ url('security/mass-assignment') }}">Masovno pridruživanje</a>

            </div>

        </div>
    </div>

@endsection