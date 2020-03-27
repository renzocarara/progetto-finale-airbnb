@extends('layouts.view_structure')

{{-- imposto il titolo della pagina --}}
@section('page-title', "BoolBnB")


@section('content')
    @include("layouts.jumbo")
    <div class="container">
        <h2 class="mb-4">Appartamenti in evidenza</h2>
        <div class="bd-example margin-bottom-xl">
            <div class="row row-cols-1 row-cols-md-3">
            @foreach($apts_sponsor as $apt_sponsor)
                @break($loop->index > 2)
                    <a class="apt-card mb-3 card-deck mr-1" href="{{ route('public.show', [$apt_sponsor->id]) }}">
                        <div class="sponsor card h-100">
                            <div class="img-container">
                                <img class="img-apt-card card-body card-img-top" src="{{$apt_sponsor->info->image ? asset('storage/' . $apt_sponsor->info->image) : asset('storage/uploads/no_apt_img.png')}}" alt="{{$apt_sponsor->title}}">
                            </div>

                            <div class="card-body">
                                <h5 class="card-title">{{ $apt_sponsor->city }}</h5>
                                <p class="card-text"><strong>{{ $apt_sponsor->title }}</strong></p>
                                <span class="neon-sponsor h5"><strong>SPONSORIZZATO</strong></span>
                            </div>
                        </div>
                    </a>
                @endforeach


                @foreach($apartments as $apartment)
                @break($loop->index > $apt_num)
                    <a class="apt-card mb-3 card-deck mr-1" href="{{ route('public.show', [$apartment->id]) }}">

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
