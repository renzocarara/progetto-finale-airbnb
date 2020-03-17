@extends('layouts.view_structure')

{{-- imposto il titolo della pagina --}}
@section('page-title', "BoolBnB")


@section('content')
    @include("layouts.jumbo")
    <div class="container">
        <h2>Appartamenti in evidenza</h2>
        <div class="bd-example">
            <div class="row row-cols-1 row-cols-md-3">
                <div class="col mb-4">
                    <div class="card h-100">
                        <svg class="bd-placeholder-img card-img-top" width="100%" height="180" href="#" preserveAspectRatio="xMidYMid slice" focusable="false" role="img" aria-label="Placeholder: Image cap">
                            <title>Placeholder</title>
                            <rect width="100%" height="100%" fill="#868e96"></rect>
                            <text x="50%" y="50%" fill="#dee2e6" dy=".3em">Image cap</text>
                        </svg>
                        <div class="card-body">
                            <h5 class="card-title">Apartment title</h5>
                            <p class="card-text">This is a short card.</p>
                        </div>
                    </div>
                </div>
                <div class="col mb-4">
                    <div class="card h-100">
                        <svg class="bd-placeholder-img card-img-top" width="100%" height="180" href="#" preserveAspectRatio="xMidYMid slice" focusable="false" role="img" aria-label="Placeholder: Image cap">
                            <title>Placeholder</title>
                            <rect width="100%" height="100%" fill="#868e96"></rect>
                            <text x="50%" y="50%" fill="#dee2e6" dy=".3em">Image cap</text>
                        </svg>
                        <div class="card-body">
                            <h5 class="card-title">Apartment title</h5>
                            <p class="card-text">This is a short card.</p>
                        </div>
                    </div>
                </div>
                <div class="col mb-4">
                    <div class="card h-100">
                        <svg class="bd-placeholder-img card-img-top" width="100%" height="180" href="#" preserveAspectRatio="xMidYMid slice" focusable="false" role="img" aria-label="Placeholder: Image cap">
                            <title>Placeholder</title>
                            <rect width="100%" height="100%" fill="#868e96"></rect>
                            <text x="50%" y="50%" fill="#dee2e6" dy=".3em">Image cap</text>
                        </svg>
                        <div class="card-body">
                            <h5 class="card-title">Apartment title</h5>
                            <p class="card-text">This is a short card.</p>
                        </div>
                    </div>
                </div>
                <div class="col mb-4">
                    <div class="card h-100">
                        <svg class="bd-placeholder-img card-img-top" width="100%" height="180" href="#" preserveAspectRatio="xMidYMid slice" focusable="false" role="img" aria-label="Placeholder: Image cap">
                            <title>Placeholder</title>
                            <rect width="100%" height="100%" fill="#868e96"></rect>
                            <text x="50%" y="50%" fill="#dee2e6" dy=".3em">Image cap</text>
                        </svg>
                        <div class="card-body">
                            <h5 class="card-title">Apartment title</h5>
                            <p class="card-text">This is a short card.</p>
                        </div>
                    </div>
                </div>
                <div class="col mb-4">
                    <div class="card h-100">
                        <svg class="bd-placeholder-img card-img-top" width="100%" height="180" href="#" preserveAspectRatio="xMidYMid slice" focusable="false" role="img" aria-label="Placeholder: Image cap">
                            <title>Placeholder</title>
                            <rect width="100%" height="100%" fill="#868e96"></rect>
                            <text x="50%" y="50%" fill="#dee2e6" dy=".3em">Image cap</text>
                        </svg>
                        <div class="card-body">
                            <h5 class="card-title">Apartment title</h5>
                            <p class="card-text">This is a short card.</p>
                        </div>
                    </div>
                </div>
                <div class="col mb-4">
                    <div class="card h-100">
                        <svg class="bd-placeholder-img card-img-top" width="100%" height="180" href="#" preserveAspectRatio="xMidYMid slice" focusable="false" role="img" aria-label="Placeholder: Image cap">
                            <title>Placeholder</title>
                            <rect width="100%" height="100%" fill="#868e96"></rect>
                            <text x="50%" y="50%" fill="#dee2e6" dy=".3em">Image cap</text>
                        </svg>
                        <div class="card-body">
                            <h5 class="card-title">Apartment title</h5>
                            <p class="card-text">This is a short card.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
