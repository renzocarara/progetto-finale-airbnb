@extends('layouts.view_structure')

{{-- imposto il titolo della pagina --}}
@section('page-title', "BoolBnB")


@section('content')
    <div class="d-flex">
        <div class="d-flex left-green">
            <img src="{{ asset('storage/background/sad.png')}}" alt="sad face">
            {{-- <img class="sad" src="{{}}sad.png" alt="sad"> --}}
        </div>
        <div class="right-blue d-flex">
            <div class="content-blue-box text-center">
                <p class="error-404"><strong>404</strong></p>
                <p>page not found!!</p>
                {{-- <button class="error-return" type="button" name="button">Back to home</button> --}}
                <a class="btn error-return" href="{{ route('public') }}">Torna in homepage</a>

            </div>
        </div>
    </div>
@endsection
