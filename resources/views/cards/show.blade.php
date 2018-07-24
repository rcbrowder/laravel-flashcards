@extends('layouts.app')

@section('content')
    <div class="container">
        <button type="button" class="btn btn-primary" onclick="window.history.back()">Back</button>

        <slideshow-component cardsdata="{{ $cards->toJson() }}"></slideshow-component>

    </div>

@endsection
