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
                         <th>Titolo Appartamento</th>
                         <th>Operazioni</th>
                     </tr>
                 </thead>
                 <tbody>
                     @forelse ($apartments as $apartment)
                     <tr>
                         <td>{{ $apartment->id }}</td>
                         <td>{{ $apartment->title }}</td>
                         <td>
                             <a class="btn btn-dark mt-1" href="{{ route('admin.apartment.show', ['apartment' => $apartment->id ]) }}">
                                 Visualizza
                             </a>
                             <a class="btn btn-secondary mt-1" href="{{ route('admin.apartment.edit', ['apartment' => $apartment->id ]) }}">
                                 Modifica
                             </a>
                             <!-- Bottone che usa un modal di Bootstrap per richiedere la conferma dell'operzione di cancellazione-->
                             {{-- @include('admin.apartment.common.delete_confirmation') --}}
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
