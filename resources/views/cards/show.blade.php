@extends('layouts.app')

@section('content')
    <div class="container">
        <button type="button" class="btn btn-primary" onclick="window.history.back()">Back</button>
        <div class="row">
            <div class="col">
                <img src="{{ asset('my-icons-collection/png/005-previous.png') }}">
            </div>

            <slideshow-component cardsdata="{{ $cards->toJson() }}"></slideshow-component>

            <div class="col text-right">
                <img src="{{ asset('my-icons-collection/png/006-next.png') }}">
            </div>
        </div>

    </div>

@endsection
