@extends('layouts.view_structure')

{{-- imposto il titolo della pagina --}}
@section('page-title', "BoolBnB - Pannello di controllo")


@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Pannello di controllo</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <h2>Benvenuto <strong>{{ Auth::user()->name }}</strong>! </h2>
                    <p>Ti sei autenticato con la seguente e-mail:  <strong>{{ Auth::user()->email }}</strong></p>
                    <p>Cosa puoi fare:</p>

                    <a class="btn btn-success" href="{{ route('admin.apartment.index') }}">Visualizza i tuoi appartamenti</a>
                    <a class="btn btn-primary" href="{{ route('admin.apartment.create') }}">Inserisci nuovi appartamenti</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
