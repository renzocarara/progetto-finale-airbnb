@extends('layouts.view_structure')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">La tua Dashboard</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <p>Benvenuto <strong>{{ Auth::user()->name }}</strong>! </p>
                    <p>Ti sei autenticato con la seguente e-mail:  <strong>{{ Auth::user()->email }}</strong></p>
                    <p> Da questa pagina puoi:</p>

                    <a class="btn btn-success" href="{{ route('admin.apartment.index') }}">Visualizzare i tuoi appartamenti</a>
                    <a class="btn btn-primary" href="{{ route('admin.apartment.create') }}">Inserire nuovi appartamenti</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
