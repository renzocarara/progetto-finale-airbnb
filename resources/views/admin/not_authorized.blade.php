@extends('layouts.view_structure')

{{-- imposto il titolo della pagina --}}
@section('page-title', "BoolBnB - Utente non autorizzato")


@section('content')
<div class="container">
    <div class="row justify-content-center margin-top-xl margin-bottom-xl">
        <div class="col-md-8">
            <h1 class="d-inline-block col-9 mb-3">OPERAZIONE NON AUTORIZZATA!</h1>
            <a class="btn-edit return-button btn btn-primary float-right" href="{{ route('admin.apartment.index') }}" data-toggle="tooltip" data-placement="bottom" title="Elenco dei tuoi appartamenti">
                {{-- I tuoi appartamenti --}}
                <i class="fas fa-list-ul"></i>
            </a>
        </div>

        <div class="col-md-8">
            <div class="card">
                <div class="card-header"><strong class="green h5">{{ Auth::user()->name }}</strong> non hai i permessi per eseguire l'operazione</div>

                <div class="card-body">
                    <h3>Dettagli:</h3>
                    <p>Se visualizzi questa pagina, vuol dire che è stato fatto un tentativo di accedere ad una pagina od eseguire un'operazione non autorizzata.
                    Contatta l'amministrtore del sito per ulteriori dettagli.</p>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
