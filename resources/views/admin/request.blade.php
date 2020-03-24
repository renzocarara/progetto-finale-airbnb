@extends('layouts.view_structure')

{{-- imposto il titolo della pagina --}}
@section('page-title', "BoolBnB - Elenco richieste")

@section('content')
<main>

    <div class="container">
       <div class="row margin-top-xl">
           <div class="col-12">
               <h1 class="d-inline-block mb-5">Tutte le richieste per l'appartamento <strong>{{ $apartment->title }}</strong></h1>
               <a class="return-button btn btn-primary float-right" href="{{ route('admin.apartment.index') }}" data-toggle="tooltip" data-placement="bottom" title="Elenco dei tuoi appartamenti">
                   {{-- I tuoi appartamenti --}}
                   <i class="fas fa-list-ul"></i>
               </a>
           </div>
       </div>
       <div class="row margin-bottom-xl">
            <div class="col-12">
                <table class="table margin-bottom-xl">
                    <thead>
                        <tr>
                            <th>E-mail</th>
                            <th>Testo messaggio</th>
                            <th>Ricevuto il</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($messages as $message)
                        <tr>
                            <td>{{ $message->email }}</td>

                            <td>{{ $message->message }}</td>

                            <td>{{ $message->created_at }}</td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="5">
                                <div class="alert alert-warning" role="alert">
                                    Non hai ricevuto nessuna richiesta per questo appartamento
                                </div>
                            </td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>

</main>
@endsection
