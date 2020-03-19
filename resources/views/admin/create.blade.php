@extends('layouts.view_structure')

{{-- imposto il titolo della pagina --}}
@section('page-title', "BoolBnB - Inserisci nuovo appartamento")

@section('content')

<main>

    <section class="container">

        <h1 class="d-inline-block">Inserimento nuovo appartamento</h1>
        <a class="return-button btn btn-primary float-right" href="{{ route('admin.apartment.index') }}">I tuoi appartamenti</a>

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

                <div class="container">

                    <h5>Titolo</h5>
                    <div class="row apt-show-row">
                        <div class="form-group col-12">
                            <label for="title">Descrizione sintetica (max 255 caratteri):</label>
                            <input type="text" class="form-control" id="title" name="title" placeholder="descrivi brevemente il tuo appartamento" value="{{ old('title') }}">
                        </div>
                    </div>


                    <h5>Indirizzo</h5>
                    <div class="row apt-show-row">
                        <div class="form-group col-12 col-sm-9 col-lg-8">
                            <label for="street">Via/Piazza/etc (max 80 caratteri):</label>
                            <input type="text" class="form-control" id="street" name="street" placeholder="inserisci l'indirizzo" value="{{ old('street') }}">
                        </div>

                        <div class="form-group col-5 col-sm-3 col-lg-2">
                            <label for="number">Numero civico:</label>
                            <input type="text" class="form-control" id="number" name="number" placeholder="inserisci il numero civico" value="{{ old('number') }}">
                        </div>
                    {{-- </div> --}}

                    {{-- <div class="row"> --}}
                        <div class="form-group col-8 col-sm-6 col-lg-5">
                            <label for="city">Città (max 50 caratteri):</label>
                            <input type="text" class="form-control" id="city" name="city" placeholder="inserisci la città" value="{{ old('city') }}">
                        </div>

                        <div class="form-group col-4 col-sm-4 col-lg-3">
                            <label for="zip">CAP:</label>
                            <input type="text" class="form-control" id="zip" name="zip" placeholder="inserisci il CAP" value="{{ old('zip') }}">
                        </div>

                        <div class="form-group col-9 col-sm-6 col-lg-4">
                            <label for="state">Stato (max 50 caratteri):</label>
                            <input type="text" class="form-control" id="state" name="state" placeholder="inserisci la nazione" value="{{ old('state') }}">
                        </div>
                    </div>

                    <h5>Descrizione</h5>
                    <div class="row apt-show-row">
                        <div class="form-group col-12">
                            <label for="summary">Descrizione dettagliata (max 1000 caratteri):</label>
                            <textarea class="form-control" id="summary" rows=6 name="summary" placeholder="scrivi qui una descrizione del tuo appartamento...">{{ old('summary') }}</textarea>
                        </div>
                    </div>

                    <h5>Spazi</h5>
                    <div class="row apt-show-row">
                        <div class="form-group col-6 col-sm-3">
                            <label for="room_num">Num. stanze:</label>
                            <input type="number" class="form-control" id="room_num" name="room_num" min="1" max="10" placeholder="inserisci numero di stanze" value="{{ old('room_num') }}">
                        </div>

                        <div class="form-group col-6 col-sm-3">
                            <label for="beds_num">Num. letti:</label>
                            <input type="number" class="form-control" id="beds_num" name="beds_num" min="1" max="10" placeholder="inserisci numero di letti" value="{{ old('beds_num') }}">
                        </div>

                        <div class="form-group col-6 col-sm-3">
                            <label for="bathroom_num">Num. bagni:</label>
                            <input type="number" class="form-control" id="bathroom_num" name="bathroom_num" min="1" max="5" placeholder="inserisci numero di bagni" value="{{ old('bathroom_num') }}">
                        </div>

                        <div class="form-group col-6 col-sm-3">
                            <label for="sq_mt">superficie(mq):</label>
                            <input type="number" class="form-control" id="sq_mt" name="sq_mt" min="25" max="200" placeholder="inserisci la metratura" value="{{ old('sq_mt') }}">
                        </div>
                    </div>

                    <h5>Servizi</h5>
                    <div class="row apt-show-row">
                        <div class="form-group col-12">
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
                    </div>

                    {{-- questo campo serve per la selezione del file immagine, l'attributo 'type' dell'<input> è "file" --}}
                    <h5>Immagine</h5>
                    <div class="row apt-show-row">
                        <div class="form-group  col-12">
                            <label for="image">Carica un'mmagine dell'appartamento:</label>
                            <input type="file" class="form-control-file" id="image" name="image">
                        </div>
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

                </div>
            </form>

        </div>

    </section>

</main>

@endsection
