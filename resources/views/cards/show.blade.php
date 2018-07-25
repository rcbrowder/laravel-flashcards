@extends('layouts.app')

@section('content')
    <div class="container">
        <button type="button" class="btn btn-primary mb-4" onclick="window.history.back()">Back</button>


        <slideshow-component cardsdata="{{ $cards->toJson() }}"></slideshow-component>

    </div>

@endsection
