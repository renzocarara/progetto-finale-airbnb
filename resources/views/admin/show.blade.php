@extends('layouts.view_structure')

@section('content')
<div class="container">

    <div class="row">
        <div class="col-12">
            <h1 class="d-inline-block mb-3">Dettagli appartamento</h1>
            <a class="btn btn-primary float-right" href="{{ route('admin.apartment.index') }}">I tuoi appartamenti</a>
        </div>
    </div>

    <div class="row">
        <div class="card-body">
            <img class="card-img-top apt-img" src="{{$apartments->info->image ? asset('storage/' . $apartments->info->image) : asset('storage/')}}" alt="{{$apartments->title}}">
            <h3 class="card-title">{{$apartments->title}}</h3>
            <p class="card-text">{{$apartments->info->summary}}</p>
        </div>
    </div>

    <div class="row apt-show-row">
        <div class="card-body">
            <h5 class="card-title">Indirizzo</h5>
            <p class="card-text">
                <ul class="list-group col-6">
                <li class="list-group-item">{{$apartments->street}}, {{$apartments->number}}</li>
                <li class="list-group-item">{{$apartments->city}}, {{$apartments->zip}}, {{$apartments->state}}</li>
            </ul>
            </p>
        </div>
    </div>

    <div class="row">
        <div class="card-body apt-show-row col-9 col-sm-5 col-lg-3">
            <h5 class="card-title">Spazi</h5>
            <p class="card-text">
                <ul class="list-group">
                    <li class="list-group-item">Stanze: {{$apartments->info->room_num}}</li>
                    <li class="list-group-item">Posti letto: {{$apartments->info->beds_num}}</li>
                    <li class="list-group-item">Bagni: {{$apartments->info->bathroom_num}}</li>
                    <li class="list-group-item">Metri quadri: {{$apartments->info->sq_mt}}</li>
                </ul>
            </p>
        </div>

        <div class="card-body  apt-show-row col-9 col-sm-5 offset-sm-1 col-lg-3 offset-lg-1">
            <h5 class="card-title">Servizi</h5>
            <p class="card-text">
                <ul class="list-group">
                    @forelse ($apartments->services as $service)
                        <li class='list-group-item'>{{$service->service}}</li>
                    @empty
                        <li class='list-group-item'>Non sono presenti servizi</li>
                    @endforelse ($services as $key => $value)
                </ul>
            </p>
        </div>
    </div>

</div>
@endsection
