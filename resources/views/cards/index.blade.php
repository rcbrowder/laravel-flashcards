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
        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">+ New Card</button>

        <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Add New Card</h5>
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
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                <button type="submit" class="btn btn-primary">Save changes</button>
                            </div>
                        </form>

                    </div>

                </div>
            </div>
        </div>
</div>


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

@endsection



<!-- <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Add New Card</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form method="post" action="/card">
                @csrf

                <div class="form-group">
                    <label for="term">Term</label>
                        <input type="text" class="form-control" name="term">
                        </div>

                    <div class="form-group">
                        <label for="definition">Definition</label>
                            <textarea class="form-control" name="definition" rows="3"></textarea>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Save changes</button>
                    </div>
                </form>

            </div>

        </div>
    </div>
</div> -->
