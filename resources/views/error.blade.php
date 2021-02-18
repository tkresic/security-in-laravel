@extends('layouts.app')

@section('content')

    <div class="row justify-content-center my-5">
        <div class="col-4 text-left">
            <h3>Izvještaj greške</h3>
            <br>
            <a href="{{ url('security/error-reporting') }}" class="btn btn-primary">Nazad</a>
        </div>
    </div>

@endsection