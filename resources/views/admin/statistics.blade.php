@extends('layouts.view_structure')

{{-- imposto il titolo della pagina --}}
@section('page-title', "BoolBnB - Statistiche")

@section('content')
<main>

    <div class="container">
       <div class="row margin-top-xl">
           <div class="col-12">
               <h1 class="d-inline-block mb-5">Le statistiche relative all'appartamento: <strong>{{ $apartment->title }}</strong></h1>
               <a class="return-button btn btn-primary float-right" href="{{ route('admin.apartment.index') }}" data-toggle="tooltip" data-placement="bottom" title="Elenco dei tuoi appartamenti">
                   {{-- I tuoi appartamenti --}}
                   <i class="fas fa-list-ul"></i>
               </a>
           </div>
       </div>
       <div class="row margin-bottom-xl">

       </div>

</main>
@endsection
