@extends('layouts.app')
@section('content')
    <div class="row justify-content-center my-5 mx-0">
        <div class="col-6">
            <h3>Primjer sažimanja</h3>
            <br>
            <p>
                Sažimanje je postupak pretvaranja podatka bilo koje veličine u podatak fiksne veličine.
                Razlika između enkripcije i sažimanja je ta da nakon što se podatak sažme, on je ireverzibilan.
                Za sažimanje je moguće koristiti Bcrypt ili Argon2 metode sažimanja.
                Ako se za logiranje i registraciju koriste zadani upravljački dijelovi,
                lozinke će se spremat pomoću Bcrypt sažimanja. Driver koji će se koristi za sažimanje
                se može namjestit u <i>config/hashing.php</i> datoteci.
            </p>
            <form id="hash-form" action="{{ route('hashString') }}" method="POST">
                @csrf
                <div>
                    <h3>Sažmi tekst</h3>
                </div>
                <div class="form-group">
                    <label for="title">Tekst</label>
                    <input type="text" class="form-control" name="hash"
                           placeholder="Unesite tekst">
                </div>
                <button type="submit" class="btn btn-primary save">Sažmi</button>
            </form>
            <br>
            <p id="result"></p>
        </div>
    </div>

@endsection

@section('script')

    <script>

        $(document).ready(function() {

            $('#hash-form').submit(function (e) {

                let form = $(this);
                let url = form.attr('action');

                $.ajax({
                    type:'POST',
                    url: url,
                    data: $(this).serialize(),
                    headers: {
                        'X-CSRF-TOKEN': '{{ csrf_token() }}'
                    },
                    success: function(response)
                    {
                        console.log(response);
                        $('#result').html('Tekst nakon sažimanja koristeći <i>Hash::make</i> metodu: ' + response);
                    }
                });

                e.preventDefault()

            });

        });

    </script>

@endsection