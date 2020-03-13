@extends('layouts.view_structure')

{{-- imposto il titolo della pagina --}}
@section('page-title', "BoolBnB - Inserisci nuovo post")

@section('content')

<main>

    <section class="container">

        <h2 class="d-inline-block">Inserimento nuovo appartamento</h2>
        <a class="btn btn-primary float-right" href="{{ route('admin.apartment.index') }}">Home</a>
        <div>

            @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
            @endif

            {{-- al submit chiamo la route 'store' che non corrisponde ad una view da visualizzare, --}}
            {{-- ma è solo del codice che elabora i dati del form e crea un oggetto Post da scrivere nel DB --}}

            {{-- NOTA: perchè il form possa gestire anche i file bisogna aggiungere questo attributo:
                 enctype="multipart/form-data" --}}
            <form class="w-100" enctype="multipart/form-data" method="post" action="{{ route('admin.apartment.store') }}">

                @csrf

                <div class="form-group">
                    <label for="title">Titolo:</label>
                    <input type="text" class="form-control" id="title" name="title" placeholder="titolo del post" value="{{ old('title') }}">
                </div>

                <div class="form-group">
                    <label for="author">Autore:</label>
                    <input type="text" class="form-control" id="author" name="author" placeholder="nome dell'autore" value="{{ old('author') }}">
                </div>

                <div class="form-group">
                    <label for="text">Testo:</label>
                    <textarea class="form-control" id="text" rows=8 name="content" placeholder="scrivi qui il tuo articolo...">{{ old('content') }}</textarea>
                </div>

                {{-- questo campo serve per la selezione del file immagine, l'attributo 'type' dell'<input> è "file" --}}
                <div class="form-group">
                    <label for="image">Immagine dell'appartemento:</label>
                    <input type="file" class="form-control-file" id="image" name="image">
                </div>


                        {{--  ---------------- VALIDAZIONE DATI - GESTIONE ERRORI ------------------------------- --}}
                        {{-- PREMESSA: se l'utente ha inserito dei dati non validi, al submit l'elaborazione del form non procede e
                        la pagina viene ricaricata. Bisogna capire cosa far vedere all'utente. In generale se aveva valorizzato
                        dei campi del form, al ricaricamento bisogna ripresentargli quei valori che aveva inserito.
                        Laravel ci mette  disposizione la funzione "old()" che, dopo il ricaricamento della pagina,
                        ci fornisce, per ogni campo del form, il valore che l'utente aveva precedentemente inserito.
                        con old('attributo_name_del_campo_del_form') abbiamo a disposizione quel valore.
                        alla old() posso passare anche un secondo parametro, è un valore che viene usato come default nel caso in cui
                        non sia presente un valore "old" per quel campo, cioè l'utente non aveva valorizzato il campo  --}}
                        {{--  ---------------- VALIDAZIONE DATI - GESTIONE ERRORI ------------------------------- --}}


                <button type="submit" class="btn btn-success">Crea</button>
                <button type="reset" class="btn btn-warning">Reset</button>
            </form>

        </div>

    </section>

</main>

@endsection
