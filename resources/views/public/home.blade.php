@extends('layouts.view_structure')

{{-- imposto il titolo della pagina --}}
@section('page-title', "BoolBnB")


@section('content')
    @include("layouts.jumbo")
    <div class="container">
        <h2>Appartamenti in evidenza</h2>
        <div class="bd-example">
            <div class="row row-cols-1 row-cols-md-3">
            @foreach($apts_sponsor as $apt_sponsor)
              @break($loop->index > 2)
                <a class="apt-card" href="{{ route('public.show', [$apt_sponsor->id]) }}" class="col mb-4">
                    <div class="card h-100">
                        <div class="img-container">
                            <img class="img-apt-card card-body card-img-top" src="{{$apt_sponsor->info->image ? asset('storage/' . $apt_sponsor->info->image) : asset('storage/')}}" alt="{{$apt_sponsor->title}}">
                        </div>

                        <div class="card-body">
                            <h5 class="card-title">{{ $apt_sponsor->city }}</h5>
                            <p class="card-text">{{ $apt_sponsor->title }}</p>
                            <span>SPONSORIZZATO</span>
                        </div>
                    </div>
                </a>
              @endforeach

              @foreach($apartments as $apartment)
              @break($loop->index > 2)
                <a class="apt-card" href="{{ route('public.show', [$apartment->id]) }}" class="col mb-4">
                    <div class="card h-100">
                        <div class="img-container">
                            <img class="img-apt-card card-body card-img-top" src="{{$apartment->info->image ? asset('storage/' . $apartment->info->image) : asset('storage/')}}" alt="{{$apartment->title}}">
                        </div>

                        <div class="card-body">
                            <h5 class="card-title">{{ $apartment->city }}</h5>
                            <p class="card-text">{{ $apartment->title }}</p>
                        </div>
                    </div>
                </a>
              @endforeach
            </div>
        </div>
    </div>
@endsection
