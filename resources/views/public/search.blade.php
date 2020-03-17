{{-- MOCKUP 2 --}}

@extends('layouts.view_structure')

{{-- imposto il titolo della pagina --}}
@section('page-title', "BoolBnB - Dettagli appartamento")


@section('content')
<div class="container">

    <div class="jumbo jumbotron jumbotron-fluid">
        <div class="container">
            <div class="container">
                <div class="white-form-container">
                    <div class="flex">
                        <h1 class="display-5 mb-3 green">Cerca il tuo appartamento</h1>
                    </div>
                    <div class="col mb-4 flex">
                        <form>
                            <div class="form-group mb-8">
                                <label for="exampleInputEmail1">
                                    Numero letti:
                                    <i class="fas fa-map-marker-alt"></i>
                                </label>
                                <input type="number" class="form-control">
                                <label for="exampleInputEmail1">
                                    Superficie:
                                    <i class="fas fa-map-marker-alt"></i>
                                </label>
                                <input type="number" class="form-control">
                            </div>
                            <button type="submit" class="btn bckg-green wht">cerca</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>
@endsection
