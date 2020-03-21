@extends('layouts.view_structure')

{{-- imposto il titolo della pagina --}}
@section('page-title', "BoolBnB - Dettagli appartamento")


@section('content')
<div class="container">

    {{-- immagine, titolo e indirizzo --}}
    <div class="row">
        <div class="card apt-show-row col-sm-12 col-lg-6">
            <img class="card-body card-img-top apt-img-lg" src="{{$apartment->info->image ? asset('storage/' . $apartment->info->image) : asset('storage//uploads/no_apt_img.png')}}" alt="{{$apartment->title}}">
            <div class="card-body">
                <h3 class="card-title">{{$apartment->title}}</h3>
            </div>
        </div>
        <div class="card-body apt-show-row col-sm-12 col-lg-5 offset-lg-1">
            <h5 class="card-title">Indirizzo</h5>
            <p class="card-text">
                <ul class="list-group">
                <li class="list-group-item">{{$apartment->street}}, {{$apartment->number}}</li>
                <li class="list-group-item">{{$apartment->city}}, {{$apartment->zip}}, {{$apartment->state}}</li>
            </ul>
            </p>
        </div>
    </div>

    {{-- descrizione, spazi e servizi --}}
    <div class="row">
        <div class="card-body apt-show-row col-sm-12 col-lg-6">
            <h5 class="card-title">Descrizione</h5>
            <p class="card-text">{{$apartment->info->summary}}</p>
        </div>

        <div class="card-body apt-show-row col-sm-12 col-lg-5 offset-lg-1">
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

    {{-- mappa, email --}}
    <div class="row">
        <div class="map card-body apt-show-row col-sm-12 col-lg-6">
            <div id="map" data-lat="{{ $apartment->lat }}" data-lon="{{ $apartment->lon }}"
                          data-address="{{ $apartment->street }} {{ $apartment->number }},
                                        {{ $apartment->zip }} {{ $apartment->city }}, {{ $apartment->state }}">
            </div>
        </div>
        <div class="email card-body apt-show-row col-sm-12 col-lg-5 offset-lg-1">
            <form>
                <div class="form-group">
                    <label for="exampleFormControlInput1">Indirizzo e-mail</label>
                    <input type="email" class="form-control" id="exampleFormControlInput1" placeholder="Inserisci la tua e-mail">
                </div>
                <div class="form-group">
                    <label for="exampleFormControlInput1">Messaggio:</label>
                    <textarea name="email-text" rows="7" class="form-control" placeholder="Inserisci il testo dell'e-mail..."></textarea>
                </div>
            </form>
        </div>
    </div>

</div>
@endsection
