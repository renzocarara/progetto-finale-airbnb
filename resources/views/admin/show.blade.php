@extends('layouts.view_structure')

@section('content')
<div class="container">
    <div class="row">
        <div class="card-body">
            <img style="width:200px" class="card-img-top" src="{{$apartments->info->image ? asset('storage/uploads/' . $apartments->info->image) : asset('storage/uploads/')}}" alt="{{$apartments->info->summary}}">
            <img style="width:200px" class="card-img-top" src="{{$apartments->info->image ? asset('storage/' . $apartments->info->image) : asset('storage/')}}" alt="{{$apartments->info->summary}}">
            <h3 class="card-title">{{$apartments->title}}</h3>
            <p class="card-text">{{$apartments->info->summary}}</p>

            <ul class="list-group col-3">
                <li class="list-group-item">{{$apartments->street}}, {{$apartments->number}}</li>
                <li class="list-group-item">{{$apartments->city}}, {{$apartments->zip}}, {{$apartments->state}}</li>
                <li class="list-group-item">Stanze: {{$apartments->info->room_num}}</li>
                <li class="list-group-item">Posti letto: {{$apartments->info->beds_num}}</li>
                <li class="list-group-item">Bagni: {{$apartments->info->bathroom_num}}</li>
                <li class="list-group-item">Metri quadri: {{$apartments->info->sq_mt}}</li>
            </ul>
        <h5>Servizi</h5>
        <ul class="list-group col-3">
            @forelse ($apartments->services as $service)
                <li class='list-group-item'>{{$service->service}}</li>
            @empty
                <li class='list-group-item'>Non sono presenti servizi</li>
            @endforelse ($services as $key => $value)
            </ul>
        </div>
    </div>
</div>
@endsection
