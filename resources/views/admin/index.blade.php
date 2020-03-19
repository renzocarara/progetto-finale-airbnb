{{-- url: 'admin/apartment'
nome route: 'admin.apartment.index'
nome view: 'index' (nella cartella views/admin/)
controller:  'apartmentController' (nella cartella Controllers\Admin\)
metodo che la richiama: 'index'  --}}

{{-- Questa pagina deve visualizzare gli appartamenti dell'utente recuperati dal DB --}}
{{-- la view riceve infatti un parametro in ingresso (apartment) che rappresenta la collection --}}
{{-- dei dati letti dal DB (dal metodo ApartmentController@index) --}}
{{-- Tramite i pulsanti nella colonna Azioni, sarà possibile eseguire delle CRUD sugli appartamenti --}}

@extends('layouts.view_structure')

{{-- imposto il titolo della pagina --}}
@section('page-title', "BoolBnB - I tuoi appartamenti")


@section('content')
<div class="container">
  <div class="row">
      <div class="col-12">
          <h1 class="d-inline-block mb-5">Tutti i tuoi appartamenti</h1>
          <a class="btn btn-primary float-right" href="{{ route('admin.apartment.create') }}">Inserisci nuovo appartamento</a>
      </div>
  </div>
  <div class="row">
      <div class="col-12">
          <table class="table">
              <thead>
                  <tr>
                      <th>ID</th>
                      <th>Descrizione sintetica</th>
                      <th>Operazioni</th>
                  </tr>
              </thead>
              <tbody>
                  @forelse ($apartments as $apartment)
                  <tr>
                      <td>{{ $apartment->id }}</td>

                      <td class="{{($apartment->trashed() ? 'trashed_apt' : '')}}">{{ $apartment->title }}</td>

                      <td>
                      @if(!$apartment->trashed())
                          <a id="display_apt" class="sm-margin btn btn-secondary mt-1" href="{{ route('admin.apartment.show', ['apartment' => $apartment->id ]) }}" data-toggle="tooltip" data-placement="top" title="visualizza">
                              {{-- Visualizza --}}
                              <i class="far fa-eye fa-lg"></i>
                          </a>
                          <a  id="modify_apt"class="sm-margin btn btn-secondary mt-1" href="{{ route('admin.apartment.edit', ['apartment' => $apartment->id ]) }}" data-toggle="tooltip" data-placement="top" title="modifica">
                          {{-- Modifica --}}
                          <i class="fas fa-pen fa-lg"></i>
                          </a>
                          <form class="d-inline-block" action="{{ route('admin.apartment.destroy', ['apartment' => $apartment->id]) }}" method="post">
                          @csrf
                          @method('DELETE')
                          <button  id="suspend_apt" class="sm-margin btn btn-secondary mt-1" type="submit" name="button" data-toggle="tooltip" data-placement="top" title="sospendi annuncio">
                              {{-- Sospendi annuncio --}}
                              <i class="fas fa-pause fa-lg"></i>
                          </button>

                          </form>

{{-- if(!in_array( $apartment->id, $elenco_sponsor_attivi)
nel controller creare un array $elenco_sponsor_attivi e poi passarlo alla view
usare (carbon) per i confronti tra date
(bisogna leggere dal DB tabella apartments_sponsorship:
tutti i record con id=apartment_id)
e con (now() > data_fine_sponsorizzazione)  --}}

                          <a  id="sponsor_apt" class="sm-margin btn btn-secondary mt-1" href="{{ route('admin.apartment.sponsor', ['apartment' => $apartment->id ]) }}" data-toggle="tooltip" data-placement="top" title="sponsorizza">
                              {{-- Sponsorizza --}}
                              <i class="fas fa-award fa-lg"></i>
                          </a>

{{-- else (c'è una sponsorizzazione attiva per quell'appartamento)

visualizzo dicitura "SPONSORIZZAZIONI GIA' ATTIVA" e non permetto al'uteNTE di attivarne altre --}}

{{-- @endif --}}
                          @else
                              <a  id="display_apt"class="suspended sm-margin btn btn-secondary mt-1" href="{{ route('admin.apartment.restore', $apartment->id) }}" data-toggle="tooltip" data-placement="top" title="ripristina">
                                  {{-- Ripristina --}}
                                  <i class="fas fa-trash-restore-alt fa-lg"></i>
                              </a>
                          @endif
                      </td>
                  </tr>
                  @empty
                  <tr>
                      <td colspan="5">
                          <div class="alert alert-warning" role="alert">
                              Non hai appartamenti nel DB di BoolBnB!
                          </div>
                      </td>
                  </tr>
              @endforelse
              </tbody>
          </table>
          {{-- paginazione fatta automaticamente da Laravel --}}
          {{-- {{ $apartments->links() }} --}}
      </div>
  </div>
</div>
@endsection
