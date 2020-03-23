@extends('layouts.view_structure')

{{-- imposto il titolo della pagina --}}
@section('page-title', "BoolBnB")


@section('content')
    <div class="d-flex">
        <div class="d-flex left-green">
            <!-- <img src="public/storage/background/sad.png" alt="sad"> -->
            <img class="sad" src="sad.png" alt="sad">
        </div>
        <div class="right-blue d-flex">
            <div class="content-blue-box text-center">
                <p class="error-404"><strong>404</strong></p>
                <p>page not found</p>
                <button class="error-return" type="button" name="button">Back to home</button>
            </div>
        </div>
    </div>
@endsection
