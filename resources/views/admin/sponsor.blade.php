@extends('layouts.view_structure')

{{-- imposto il titolo della pagina --}}
@section('page-title', "BoolBnB - Aggiungi una sponsorizzazione al tuo appartamento")


@section('content')
<div class="container">

<h1>Inserisci una sponsorizzazione</h1>

<p>{{ $apartment->title }}</p>


<div class="row apt-show-row">
    <div class="card-body">
        <h5 class="card-title">Seleziona la sponsorizzazione:</h5>
        <div class="card-text">
            <form class="w-100" enctype="multipart/form-data" method="post" action="{{ route('admin.apartment.checkout',  ['apartment' => $apartment->id ]) }}">

                @csrf

                @foreach ($sponsorships as $sponsorship)
                    <label for="sponsor_{{ $sponsorship->id }}">

                    <input id="sponsor_{{ $sponsorship->id }}" type="radio" name="sponsorship_id" value="{{ $sponsorship->id }}" >
                        {{ $sponsorship->type }} - {{ $sponsorship->price }} € per {{ $sponsorship->hours }} ore di sponsorizzazione!  
                    </label>
                    <br>
                @endforeach

                <p>qui campi per CC, scadenza, CVV --->BRAIN TREE</p>

                <button type="submit" class="btn btn-success">Paga</button>

           </form>
       </div>
    </div>
</div>

</div>
@endsection
