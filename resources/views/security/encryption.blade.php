@extends('layouts.app')
@section('content')
    <div class="row justify-content-center my-5 mx-0">
        <div class="col-6">
            <h3>Primjer enkripcije</h3>
            <br>
            <p>
                Enkripcija je proces kodiranja poruke u na taj način da je mogu razumjeti samo autorizirani korisnici.
                Laravel koristi OpenSSL za enkripciju podataka pomoću AES (Advanced Encryption Standard)
                enkripcijskog algoritma. OpenSSL je besplatni softver za sigurnu komunikaciju preko
                računalne mreže koji ima gotove kriptografske funkcije. U Laravelu je moguće koristiti
                AES-256 ili AES-128. Brojevi 256 i 128 predstavljaju veličinu
                ključa u bitovima zaenkripciju i dekripciju.
            </p>
            <form id="encrypt-form" action="{{ route('encryptString') }}" method="POST">
                @csrf
                <div>
                    <h3>Enkriptiraj tekst</h3>
                </div>
                <div class="form-group">
                    <label for="title">Tekst</label>
                    <input type="text" class="form-control" name="hash"
                           placeholder="Unesite tekst">
                </div>
                <button type="submit" class="btn btn-primary save">Sažmi</button>
            </form>
            <br>
            <p id="result" style="word-wrap: break-word;"></p>
        </div>
    </div>

@endsection

@section('script')

    <script>

        $(document).ready(function() {

            $('#encrypt-form').submit(function (e) {

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
                        $('#result').html('Tekst nakon enkriptiranja koristeći <i>encrypt</i> metodu: ' + response);
                    }
                });

                e.preventDefault()

            });

        });

    </script>

@endsection