@extends('layouts.view_structure')

{{-- imposto il titolo della pagina --}}
@section('page-title', "BoolBnB - Dettagli appartamento")


@section('content')
<div class="container">
    <div class="row">
        <div class="col-12">
            <h1 class="d-inline-block mb-3">Dettagli appartamento</h1>
            <a class="btn btn-primary float-right" href="{{ route('admin.apartment.index') }}">I tuoi appartamenti</a>
        </div>
    </div>

    {{-- immagine e titolo --}}
    <div class="row">
        <div class="card apt-show-row ">
            <img class="card-body card-img-top apt-img-lg" src="{{$apartment->info->image ? asset('storage/' . $apartment->info->image) : asset('storage/')}}" alt="{{$apartment->title}}">
            <div class="card-body">
                <h3 class="card-title">{{$apartment->title}}</h3>
            </div>
        </div>
    </div>

    {{-- indirizzo --}}
    <div class="row apt-show-row">
        <div class="card-body">
            <h5 class="card-title">Indirizzo</h5>
            <p class="card-text">
                <ul class="list-group col-6">
                <li class="list-group-item">{{$apartment->street}}, {{$apartment->number}}</li>
                <li class="list-group-item">{{$apartment->zip}} {{$apartment->city}}, {{$apartment->state}}</li>
            </ul>
            </p>
        </div>
    </div>

    {{-- descrizione, spazi e servizi --}}
    <div class="row">
        <div class="card-body apt-show-row col-9 col-sm-5 col-lg-6">
            <h5 class="card-title">Descrizione:</h5>
            <p class="card-text">{{$apartment->info->summary}}</p>
            <p class="card-text">{{$apartment->info->summary}}</p>
        </div>

        <div class="card-body apt-show-row col-9 col-sm-5 offset-sm-2 col-lg-5 offset-lg-1">
            <div class="">
                <h5 class="card-title">Spazi</h5>
                <p class="card-text">
                    <ul class="list-group">
                        <li class="list-group-item">Stanze: {{$apartment->info->room_num}}</li>
                        <li class="list-group-item">Posti letto: {{$apartment->info->beds_num}}</li>
                        <li class="list-group-item">Bagni: {{$apartment->info->bathroom_num}}</li>
                        <li class="list-group-item">Metri quadri: {{$apartment->info->sq_mt}}</li>
                    </ul>
                </p>

                <h5 class="card-title">Servizi</h5>
                <p class="card-text">
                    <ul class="list-group">
                        @forelse ($apartment->services as $service)
                            <li class='list-group-item'>{{$service->service}}</li>
                        @empty
                            <li class='list-group-item'>Non sono presenti servizi</li>
                        @endforelse
                    </ul>
                </p>
            </div>
        </div>
    </div>
</div>
@endsection
