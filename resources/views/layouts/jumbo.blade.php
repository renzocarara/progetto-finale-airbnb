<div class="jumbo jumbotron jumbotron-fluid">
    <div class="container">
        <div class="blk-form-container">
            <h1 class="display-5 mb-3 green">Cerca il tuo appartamento</h1>
            <div>
                {{-- il blocco che segue serve per la validazione, 'lato server', dei dati del form --}}
                @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
                 @endif
                <form method="post" action="{{ route('public.search') }}">
                @csrf
                    @foreach ($apts_sponsor as $apt_sponsor)
                        <input type="hidden" name="apts_sponsor[]" value="{{ $apt_sponsor->id }}">
                    @endforeach

                    {{-- campi nascosti per salvare i valori di latitudine e longitudine che arrivano da chiamata AJAX a TomTom --}}
                    <div class="form-group">
                        <input class="lat-input" type="hidden" name="lat" value="{{ old('lat') }}">
                        <input class="lon-input" type="hidden" name="lon" value="{{ old('lon') }}">
                    </div>

                    <div class="form-group mb-7">
                        <label for="place" class="wht">
                            Dove vuoi andare?
                            <i class="fas fa-map-marker-alt"></i>
                        </label>
                        <input type="text" class="form-control col-9" id="where" name="place" placeholder="Indica una città">
                    </div>
                    <button type="submit" id="submit-search" class="btn bckg-green wht">cerca</button>
                </form>
            </div>
        </div>
    </div>
</div>
