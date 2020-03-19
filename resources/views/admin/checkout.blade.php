@extends('layouts.view_structure')

{{-- imposto il titolo della pagina --}}
@section('page-title', "BoolBnB - Pagamento sponsorizzazione ok")


@section('content')
<div class="container">

<h1>Complimenti, pagamento effettuato</h1>
<p>Il tuo appartamento {{ $apartment->title}} apparirà in evidenza...</p>

<a class="btn btn-primary float-right" href="{{ route('admin.apartment.index') }}">I tuoi appartamenti</a>



</div>
@endsection
