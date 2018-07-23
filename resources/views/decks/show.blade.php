@extends('layouts.app')

@section('content')

    <div class="container">

        <h1 class="mb-4">{{ $deck->name }}</h1>

        <a href="/cards/card" class="btn btn-success">Start Quiz!</a>



        <div class="modal fade" id="newCardModal" tabindex="-1" role="dialog" aria-labelledby="newCardModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="newCardModalLabel">Add New Card</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                               <span aria-hidden="true">&times;</span>
                           </button>
                    </div>
                    <div class="modal-body">
                        <form method="post" action="/cards">
                            @csrf

                            <div class="form-group">
                                <label for="term">Term</label>
                                <input type="text" class="form-control" name="term">
                            </div>

                            <div class="form-group">
                                <label for="definition">Definition</label>
                                <textarea class="form-control" name="definition" rows="3"></textarea>
                            </div>

                            <input name="deck_id" type="hidden" value="{{ $deck->id }}">

                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                <button type="submit" class="btn btn-primary">Save changes</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>

        <h2 class="mt-4">Cards</h2>

        <div class="container cardContainer">
            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#newCardModal">+ New Card</button>
            @foreach ($cards as $card)

        		<div class="card m-2 text-center">
                    <div class="card-body">
                        <h5 class="card-title">{{ $card->term }}</h5>
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
