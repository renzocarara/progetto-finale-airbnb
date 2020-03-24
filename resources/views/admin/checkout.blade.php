@extends('layouts.view_structure')

{{-- imposto il titolo della pagina --}}
@section('page-title', "BoolBnB - Pagamento sponsorizzazione ok")


@section('content')
<div class="container">
    <div class="row display-flex margin-top-xl">
        <div class="col-12">
            <h1 class="title-checkout col-md-8 d-inline-block mb-5">Complimenti, pagamento effettuato</h1>
            <a class="btn-checkout btn btn-primary float-right mb-5" href="{{ route('admin.apartment.index') }}">I tuoi appartamenti</a>
        </div>
    </div>

    <p class="margin-bottom-xl">Il tuo appartamento {{ $apartment->title}} apparirà in evidenza...</p>
</div>
@endsection
