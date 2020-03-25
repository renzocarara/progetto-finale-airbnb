@extends('layouts.view_structure')

{{-- imposto il titolo della pagina --}}
@section('page-title', "BoolBnB - Elenco richieste")

@section('content')
<main>

    <div class="container">
       <div class="row margin-top-xl">
           <div class="col-12">
               <h3 class="d-inline-block mb-5">Elenco richieste per
                    <br>
                    <strong>{{ $apartment->title }}</strong>
                </h3>
                <a class="return-button btn btn-primary float-right mb-5" href="{{ route('admin.apartment.index') }}" data-toggle="tooltip" data-placement="bottom" title="Elenco dei tuoi appartamenti">
                    {{-- I tuoi appartamenti --}}
                    <i class="fas fa-list-ul fa-2x"></i>
                </a>
            </div>
        </div>
        <div class="row">
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

        <div class="margin-bottom-xl">
            <nav class="d-flex justify-content-center" aria-label="">
                <ul class="pagination">
                    <li class="page-item disabled">
                        <span class="page-link" data-toggle="tooltip" data-placement="bottom" title="indietro">
                            <i class="fas fa-chevron-left"></i>
                        </span>
                    </li>
                    <li class="page-item">
                        <a class="page-link" href="#">1</a>
                    </li>
                    <li class="page-item active" aria-current="page">
                        <span class="page-link">
                            2
                            <span class="sr-only">(current)</span>
                        </span>
                    </li>
                    <li class="page-item">
                        <a class="page-link" href="#">3</a>
                    </li>
                    <li class="page-item">
                        <a class="page-link" href="#" data-toggle="tooltip" data-placement="bottom" title="avanti">
                            <i class="fas fa-chevron-right"></i>
                        </a>
                    </li>
                </ul>
            </nav>
        </div>
    </div>

</main>
@endsection
