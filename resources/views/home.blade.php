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
                            <form method="post" action="/cards">
		                    @csrf

                            <div class="form-group">
                                <label for="name">Term</label>
                                    <input type="text" class="form-control" name="term">
                                    </div>

                                <div class="form-group">
                                    <label for="description">Definition</label>
                                        <textarea class="form-control" name="definition" rows="3"></textarea>
                                </div>
                            </form>

                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            <button type="button" class="btn btn-primary">Save changes</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
