@extends('layouts.app')

@section('content')
<div class="container">
    <button type="button" class="btn btn-primary" onclick="window.location.href='/cards'">Back</button>

    <div class="card m-2 text-center">
        <div class="card-header">{{ $cards->term }}</div>
        <div class="card-body">{{ $cards->definition }}</div>
    </div>
</div>

@endsection
