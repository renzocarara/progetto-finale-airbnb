@extends('layouts.view_structure')

{{-- imposto il titolo della pagina --}}
@section('page-title', "BoolBnB - Inserisci nuovo post")

@section('content')

<main>

    <section class="container">

        <h2 class="d-inline-block">Inserimento nuovo appartamento</h2>
        <a class="btn btn-primary float-right" href="{{ route('admin.apartment.index') }}">I tuoi appartamenti</a>
        <div>

            {{-- il blocco che segue serve per la validazione dei dati del form --}}
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
                    <label for="title">Descrizione sintetica (max 255 caratteri):</label>
                    <input type="text" class="form-control" id="title" name="title" placeholder="descrivi brevemente il tuo appartamento" value="{{ old('title') }}">
                </div>

                <div class="form-group">
                    <label for="city">Città (max 50 caratteri):</label>
                    <input type="text" class="form-control" id="city" name="city" placeholder="inserisci la città" value="{{ old('city') }}">
                </div>

                <div class="form-group">
                    <label for="street">Via/Piazza/etc (max 80 caratteri):</label>
                    <input type="text" class="form-control" id="street" name="street" placeholder="inserisci l'indirizzo" value="{{ old('street') }}">
                </div>

                <div class="form-group">
                    <label for="number">Numero civico:</label>
                    <input type="text" class="form-control" id="number" name="number" placeholder="inserisci il numero civico" value="{{ old('number') }}">
                </div>

                <div class="form-group">
                    <label for="zip">CAP:</label>
                    <input type="text" class="form-control" id="zip" name="zip" placeholder="inserisci il CAP" value="{{ old('zip') }}">
                </div>

                <div class="form-group">
                    <label for="state">Stato (max 50 caratteri):</label>
                    <input type="text" class="form-control" id="state" name="state" placeholder="inserisci la nazione" value="{{ old('state') }}">
                </div>

                <div class="form-group">
                    <label for="summary">Descrizione dettagliata (max 1000 caratteri):</label>
                    <textarea class="form-control" id="summary" rows=6 name="summary" placeholder="scrivi qui una descrizione del tuo appartamento...">{{ old('summary') }}</textarea>
                </div>

                <div class="form-group">
                    <label for="room_num">Numero di stanze:</label>
                    <input type="number" class="form-control" id="room_num" name="room_num" min="1" max="10" placeholder="inserisci numero di stanze" value="{{ old('room_num') }}">
                </div>

                <div class="form-group">
                    <label for="beds_num">Numero di letti:</label>
                    <input type="number" class="form-control" id="beds_num" name="beds_num" min="1" max="10" placeholder="inserisci numero di letti" value="{{ old('beds_num') }}">
                </div>

                <div class="form-group">
                    <label for="bathroom_num">Numero di bagni:</label>
                    <input type="number" class="form-control" id="bathroom_num" name="bathroom_num" min="1" max="5" placeholder="inserisci numero di bagni" value="{{ old('bathroom_num') }}">
                </div>

                <div class="form-group">
                    <label for="sq_mt">Superficie in mq:</label>
                    <input type="number" class="form-control" id="sq_mt" name="sq_mt" min="25" max="200" placeholder="inserisci la metratura" value="{{ old('sq_mt') }}">
                </div>

                <div class="form-group">
                    @if($services->count() > 0)
                        <p>Seleziona i servizi</p>
                        @foreach ($services as $service)
                            <label for="service_{{ $service->id }}">
                                <input id="service_{{ $service->id }}" type="checkbox" name="service_id[]" value="{{ $service->id }}"
                                {{in_array($service->id, old('service_id', array())) ? 'checked' : ''}} >
                                {{ $service->service }}
                            </label>
                        @endforeach
                    @endif
                </div>

                {{-- questo campo serve per la selezione del file immagine, l'attributo 'type' dell'<input> è "file" --}}
                <div class="form-group">
                    <label for="image">Carica un'mmagine dell'appartamento:</label>
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
