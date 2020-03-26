{{-- MOCKUP 2 --}}

@extends('layouts.view_structure')

{{-- imposto il titolo della pagina --}}
@section('page-title', "BoolBnB - Dettagli appartamento")


@section('content')
    <div class="container">
        <div class="white-form-container">
            <div class="flex">
                <h1 class="display-5 mb-3 green">Cerca il tuo appartamento</h1>


                <form>
                    <div class="form-group">
                        <label for="exampleInputEmail1">
                            Numero letti:
                        </label>
                        <input type="number" class="form-control">
                        <label for="exampleInputEmail1">
                            Superficie:
                        </label>
                        <input type="number" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">
                            Seleziona i servizi:
                        </label>
                    </div>
                    <div class="form-inline">
                        <div class="frm-search form-check">
                            <input class="form-check-input" type="radio" name="exampleRadios" id="service" value="service">
                            <label class="form-check-label" for="service">
                                Wi-fi
                            </label>
                        </div>
                        <div class="frm-search form-check">
                            <input class="form-check-input" type="radio" name="exampleRadios" id="service" value="service">
                            <label class="form-check-label" for="service">
                                Swimming pool
                            </label>
                        </div>
                        <div class="frm-search form-check">
                            <input class="form-check-input" type="radio" name="exampleRadios" id="service" value="service">
                            <label class="form-check-label" for="service">
                                Reception
                            </label>
                        </div>
                        <div class="frm-search form-check">
                            <input class="form-check-input" type="radio" name="exampleRadios" id="service" value="service">
                            <label class="form-check-label" for="service">
                                Sauna
                            </label>
                        </div>
                        <div class="frm-search form-check">
                            <input class="form-check-input" type="radio" name="exampleRadios" id="service" value="service">
                            <label class="form-check-label" for="service">
                                Sea view
                            </label>
                        </div>
                        <div class="frm-search form-check">
                            <input class="form-check-input" type="radio" name="exampleRadios" id="service" value="service">
                            <label class="form-check-label" for="service">
                                Parking
                            </label>
                        </div>
                    </div>
                    <button type="submit" class="btn bckg-green wht research">cerca</button>
                </form>

                <h3>Risultati della ricerca</h3>

                @foreach($apts_sponsor as $apt_sponsor)
                    @break($loop->index > 0)
                    <a class="apt-card mb-3" href="{{ route('public.show', [$apt_sponsor->id]) }}">
                        <div class="card sponsor mb-3">
                            <div class="row no-gutters">
                                <div class="col-md-4">
                                    <img src="{{$apt_sponsor->info->image ? asset('storage/' . $apt_sponsor->info->image) : asset('storage/uploads/no_apt_img.png')}}" alt="{{$apt_sponsor->title}}" class="card-img m-2">
                                </div>
                                <div class="col-md-8">
                                    <div class="card-body">
                                        <h5 class="card-title d-inline-block"><strong>{{ $apt_sponsor->city }}</strong></h5>
                                        <span class="neon-sponsor float-right h6"><strong>SPONSORIZZATO</strong></span>
                                        <p class="card-text"><strong>{{ $apt_sponsor->title }}</strong></p>
                                        <p class="card-text">{{ $apt_sponsor->info->summary }}</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </a>  
                @endforeach

                @foreach ($places as $place)
                    <a class="apt-card" href="{{ route('public.show', $place->id) }}">
                    <div class="card mb-3">
                            <div class="row no-gutters">
                                <div class="col-md-4">
                                    <img src="{{$place->info->image ? asset('storage/' . $place->info->image) : asset('storage/uploads/no_apt_img.png')}}" alt="{{$place->title}}" class="card-img m-2">
                                </div>
                                <div class="col-md-8">
                                    <div class="card-body">
                                        <h5 class="card-title d-inline-block"><strong>{{ $place->city }}</strong></h5>
                                        <p class="card-text"><strong>{{ $place->title }}</strong></p>
                                        <p class="card-text">{{ $place->info->summary }}</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </a>
                @endforeach

            </div>
        </div>
    </div>
@endsection
