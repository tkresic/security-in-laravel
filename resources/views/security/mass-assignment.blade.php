@extends('layouts.app')
@section('content')
    <div class="row justify-content-center my-5 mx-0">
        <div class="col-6">
            <h3>Primjer masovnog pridruživanja</h3>
            <br>
            <h6 class="font-weight-bold">Opis</h6>
            <p>
                Masovno pridruživanje omogućava stvaranje novog modela u jednoj liniji koda.
            </p>
            <h6 class="font-weight-bold">Problem</h6>
            <p>
                Recimo da imamo studentski portal gdje se studenti registriraju i mogu gledati i dodavati sadržaj. Za to bi mogli imati
                tablicu <i>students</i> sa 5 polja: <i>student_type, first_name, last_name, date_of_birth</i> i <i>gender</i>
                gdje <i>student_type</i> predstavlja polje koje govori kolike ovlasti ima student i može iznositi od 1 do 3, gdje 1 predstavlja samo
                gledanje sadržaja, 2 gledanje i dodavanje sadržaja a 3 gledanje, dodavanje i brisanje sadržaja.
                Studenti se trebaju registrirat na stranici i unijet svoje ime, prezime, dob i spol dok bi se <i>student_type</i> automatski unosio kasnije neovisno o registraciji.
            </p>
            <h6 class="font-weight-bold">Rješenje</h6>
            <p>
                Polja <i>first_name</i>, <i>last_name</i>, <i>date_of_birth</i> i <i>gender</i> možemo masovno pridruživat no polje <i>student_type</i> bi trebali zaštiti.
            </p>
            <h6 class="font-weight-bold">Upute</h6>
            <p>
                U modelu atribut <i>student_type</i> je stavljen kao <i>fillable</i>. Na taj način, ako u zahtjevu pošaljemo
                <i>student_type</i> podatak i damo mu vrijednost 3, student će se registrirat sa ovlastima da gleda, piše i briše sadržaj.
                <br>
                <small>
                    U pregledniku u formi je moguće dodati
                    <br>
                    <i>&lt;input type="hidden" name="student_type" value="3"&gt;</i>
                    <br>
                    i na taj način će se poslat umetnuta vrijednost ovlasti.
                </small>
            </p>
            <form action="{{ route('registerStudents') }}" method="POST">
                @csrf
                <div>
                    <h3>Registriraj se</h3>
                </div>
                <div class="form-group">
                    <label for="first_name">Ime</label>
                    <input type="text" class="form-control" name="first_name"
                           placeholder="Unesite vaše ime" required>
                </div>
                <div class="form-group">
                    <label for="last_name">Prezime</label>
                    <input type="text" class="form-control" name="last_name"
                           placeholder="Unesite vaše prezime" required>
                </div>
                <div class="form-group">
                    <label for="dob">Datum rođenja</label>
                    <input type="date" class="form-control" name="dob"
                           placeholder="Unesite vašu dob" required>
                </div>
                <div class="form-group">
                    <label for="gender">Spol</label>
                    <br>
                    <input type="radio" name="gender" value="male" required>&nbsp;Muško<br>
                    <input type="radio" name="gender" value="female" required>&nbsp;Žensko<br>
                </div>
                <button type="submit" class="btn btn-primary save">Registriraj se</button>
            </form>
        </div>
    </div>

@endsection