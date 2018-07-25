@extends('layouts.app')

@section('content')

    @if ($errors->any())
        <div class="alert alert-danger flash-card-width mb-3">
            <ul class="mb-0">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    @if (session('status'))
        <div class="alert alert-success flash-card-width mb-3" role="alert">
            {{ session('status') }}
        </div>
    @endif

    <div class="container">
        <div class="row">

            <div class="col">
                <h2>Decks</h2>
            </div>

            <div class="col text-right">
                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#newDeckModal">+ New Deck</button>
                <!-- <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">+ New Card</button> -->
            </div>
        </div>




            <div class="modal fade" id="newDeckModal" tabindex="-1" role="dialog" aria-labelledby="newDeckModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">

                            <h5 class="modal-title" id="newDeckModalLabel">Add New Deck</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                   <span aria-hidden="true">&times;</span>
                            </button>

                        </div>
                        <div class="modal-body">
                            <form method="post" action="/decks">
                                @csrf

                                <div class="form-group">
                                    <label for="name">Name</label>
                                    <input type="text" class="form-control" name="name">
                                </div>

                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                    <button type="submit" class="btn btn-primary">Save</button>
                                </div>

                            </form>
                        </div>
                    </div>
                </div>
            </div>


        <div class="container row decksContainer">

            <!-- TODO: Make decksContainer scroll horizontally. -->

            @foreach ($decks as $deck)
                <div class="col col-md-3">
                    <div class="card m-2 text-center">
                        <a href="/decks/{{ $deck->id }}">
                            <div class="card-body">
                                <h5 class="card-title">{{ $deck->name }}</h5>


                                <!-- <a class="btn btn-sm btn-outline-success" href="/decks/{{ $deck->id }}" class="card-link">Show</a>
                                <a class="btn btn-sm btn-outline-primary" href="/decks/{{ $deck->id }}/edit" class="card-link">Edit</a>


                                <form style="display: inline-block;" method="post" action="/decks/{{ $deck->id }}">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-sm btn-outline-danger">Delete</button>
                                </form> -->
                            </div>
                        </a>
                    </div>
                </div>

            @endforeach

        </div>

        <h2 class="mt-4">Cards</h2>
        <div class="container cardContainer">
            @foreach ($cards as $card)

        		<div class="card m-2 text-center">
                    <div class="card-body">
                        <h5 class="card-title">{{ $card->term }}</h5>
                        <p> "{{ $card->definition }}" </p>
        	            <a class="btn btn-sm btn-outline-success" href="/cards/{{ $card->id }}" class="card-link">Show</a>
                        <a class="btn btn-sm btn-outline-primary" href="/cards/{{ $card->id }}/edit" class="card-link">Edit</a>
                        <form style="display: inline-block;" method="post" action="/cards/{{ $card->id }}">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-sm btn-outline-danger">Delete</button>
                        </form>
                    </div>
                </div>

            @endforeach
        </div>

    </div>

@endsection
