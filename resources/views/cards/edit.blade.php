@extends('layouts.app')

@section('content')

	<form method="get" action="/cards/{{ $card->id }}">
		@csrf
		@method('PATCH')

		<div class="form-group">
			<label for="term">Term</label>
			<input type="text" class="form-control" name="term" id="term" value="{{ $card->term }}">
		</div>

		<div class="form-group">
			<label for="description">Definition</label>
			<textarea class="form-control" id="description" name="definition" rows="3">{{ $card->definition }}</textarea>
		</div>

		<a href="/decks/{{ $card->deck_id }}" class="btn btn-secondary">Cancel</a>
		<button class="btn btn-primary" type="submit">Save</button>

	</form>

@endsection
