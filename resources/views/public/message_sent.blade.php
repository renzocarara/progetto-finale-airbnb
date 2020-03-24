@extends('layouts.view_structure')

{{-- imposto il titolo della pagina --}}
@section('page-title', "BoolBnB - Messaggio inviato")


@section('content')
<div class="container">


    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <h1>IL TUO MESSAGGIO E' STATO INVIATO!</h1>
                <div class="card">
                    <div class="card-header">Il proprietario dell'appartamento ha ricevuto la tua richiesta di informazioni.</div>

                    <div class="card-body">
                        <h2>La tua richiesta per: <strong>{{$apartment->title}}</strong></h2>
                        <p>
                            {{ $new_message->message }}
                            {{-- {{ $new_message->created_at }} --}}
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>
@endsection
