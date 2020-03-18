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
                        <td>{{ $apartment->title }}</td>
                        <td>
                        @if(!$apartment->trashed())
                            <a class="sm-margin btn btn-dark mt-1" href="{{ route('admin.apartment.show', ['apartment' => $apartment->id ]) }}" data-toggle="tooltip" data-placement="top" title="visualizza">
                                {{-- Visualizza --}}
                                <i class="far fa-eye"></i>
                            </a>
                            <a class="sm-margin btn btn-secondary mt-1" href="{{ route('admin.apartment.edit', ['apartment' => $apartment->id ]) }}" data-toggle="tooltip" data-placement="top" title="modifica">
                            {{-- Modifica --}}
                            <i class="fas fa-pen"></i>
                            </a>
                            <form action="{{ route('admin.apartment.destroy', ['apartment' => $apartment->id]) }}" method="post">
                            @csrf
                            @method('DELETE')
                            <button class="sm-margin btn btn-warning" type="submit" name="button" data-toggle="tooltip" data-placement="top" title="sospendi annuncio">
                                {{-- Sospendi annuncio --}}
                                <i class="fas fa-pause"></i>
                            </button>

                            </form>
{{-- if($elenco_sponsor_attivi['$apartment->id']==false) --}}
{{-- if appartamento non ha sponsorizzazioni attive  (now() > data_fine_sponsorizzazione)
     (bisogna leggere dal DB tabella apartments_sponsorship tutti i record con id=apartment_id) --}}

                            <a class="btn btn-dark mt-1" href="{{ route('admin.apartment.sponsor', ['apartment' => $apartment->id ]) }}">
                                Sponsorizza
                                {{-- Giada, per 'sponsorizza' userei questa icona qui sotto --}}
                                {{-- <i class="fas fa-award"></i> --}}
                                {{-- le icone le ingrandirei un pochino aggiungendo la classe fa-lg oppure fa-2x --}}
                            </a>

{{-- else (ci sono sponsorizzazioni attive)
visualizzo dicitura "SPONSORIZZAZIONI ATTIVE" e non permetto al'utenet di attivarne altre --}}

                            @else
                                <a class="suspended sm-margin btn btn-secondary mt-1" href="{{ route('admin.apartment.restore', $apartment->id) }}" data-toggle="tooltip" data-placement="top" title="ripristina">
                                    {{-- Ripristina --}}
                                    <i class="fas fa-trash-restore-alt"></i>
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
