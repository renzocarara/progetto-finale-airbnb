@extends('layouts.view_structure')

{{-- imposto il titolo della pagina --}}
@section('page-title', "BoolBnB - Utente non autorizzato")


@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <h1>OPERAZIONE NON AUTORIZZATA!</h1>
            <div class="card">
                <div class="card-header">L'utente <strong class="green h5">{{ Auth::user()->name }}</strong> non ha i permessi per eseguire l'operazione</div>

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
