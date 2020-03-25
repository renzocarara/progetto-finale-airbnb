<div class="jumbo jumbotron jumbotron-fluid">
    <div class="container">
        <div class="container">
            <div class="blk-form-container">
                <div class="flex">
                    <h1 class="display-5 mb-3 green">Cerca il tuo appartamento</h1>
                </div>
                <div class="col mb-4 flex">

                    <form method="post" action="{{ route('public.search') }}">

                        @foreach ($apts_sponsor as $apt_sponsor)
                            <input type="hidden" name="apts_sponsor[]" value="{{ $apt_sponsor->id }}">
                        @endforeach

                        @csrf
                        <div class="form-group mb-8">
                            <label for="place" class="wht">
                                Dove vuoi andare?
                                <i class="fas fa-map-marker-alt"></i>
                            </label>
                            <input type="text" class="form-control" id="where" name="place" placeholder="Indica una città">
                        </div>
                        <button type="submit" class="btn bckg-green wht">cerca</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
