@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row justify-content-between">
        <div class="col-md-3">
            <button type="button" class="btn btn-secondary">Deck</button>
        </div>

        <div class="col-md-3">
            <button type="button" class="btn btn-primary float-right" data-toggle="modal" data-target="#exampleModal">+ New Card</button>

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
            </div>
        </div>
    </div>

    <!-- <div class="row justify-content-center">
        @foreach ($cards as $card)
            <p>{{ $card->definition }} : {{ $card->term }}<br /></p>
        @endforeach
    </div> -->
    <div class="row justify-content-center mt-4">
        <div class="card" style="width:90%;height:400px;">
            <div class="card-body">
                <button type="button" class="btn btn-secondary" data-toggle="modal" data-target="#editModal">Edit Card</button>
            </div>

            <div class="card-body align-middle text-center">
                {{ $card->definition }}
            </div>

            <div class="card-body">
                <button type="button" class="btn btn-danger">Delete Card</button>
            </div>


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
        </div>
    </div>
</div>

@endsection
