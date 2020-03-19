{{-- MOCKUP 2 --}}

@extends('layouts.view_structure')

{{-- imposto il titolo della pagina --}}
@section('page-title', "BoolBnB - Dettagli appartamento")


@section('content')
    <div class="container">
        <div class="white-form-container">
            <div class="flex">
                <h1 class="display-5 mb-3 green">Cerca il tuo appartamento</h1>


                <form>
                    <div class="form-group">
                        <label for="exampleInputEmail1">
                            Numero letti:
                        </label>
                        <input type="number" class="form-control">
                        <label for="exampleInputEmail1">
                            Superficie:
                        </label>
                        <input type="number" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">
                            Seleziona i servizi:
                        </label>
                    </div>
                    <div class="form-inline">
                        <div class="frm-search form-check">
                            <input class="form-check-input" type="radio" name="exampleRadios" id="exampleRadios2" value="option2">
                            <label class="form-check-label" for="exampleRadios2">
                                Wi-fi
                            </label>
                        </div>
                        <div class="frm-search form-check">
                            <input class="form-check-input" type="radio" name="exampleRadios" id="exampleRadios2" value="option2">
                            <label class="form-check-label" for="exampleRadios2">
                                Swimming pool
                            </label>
                        </div>
                        <div class="frm-search form-check">
                            <input class="form-check-input" type="radio" name="exampleRadios" id="exampleRadios2" value="option2">
                            <label class="form-check-label" for="exampleRadios2">
                                Reception
                            </label>
                        </div>
                        <div class="frm-search form-check">
                            <input class="form-check-input" type="radio" name="exampleRadios" id="exampleRadios2" value="option2">
                            <label class="form-check-label" for="exampleRadios2">
                                Sauna
                            </label>
                        </div>
                        <div class="frm-search form-check">
                            <input class="form-check-input" type="radio" name="exampleRadios" id="exampleRadios2" value="option2">
                            <label class="form-check-label" for="exampleRadios2">
                                Sea view
                            </label>
                        </div>
                        <div class="frm-search form-check">
                            <input class="form-check-input" type="radio" name="exampleRadios" id="exampleRadios2" value="option2">
                            <label class="form-check-label" for="exampleRadios2">
                                Parking
                            </label>
                        </div>
                    </div>
                    <button type="submit" class="btn bckg-green wht research">cerca</button>
                </form>

                <h3>Risultati della ricerca</h3>
                <a class="apt-card" href="#">
                    <div class="card h-100">
                        <div class="img-container">
                            <img class="img-apt-card card-body card-img-top" src="#" alt="immagine appartamento">
                        </div>

                        <div class="card-body">
                            <h5 class="card-title">Città</h5>
                            <p class="card-text">Titolo appartamento</p>
                        </div>
                    </div>
                </a>


            </div>
        </div>
    </div>
@endsection
