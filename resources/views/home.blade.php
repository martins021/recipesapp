@extends('layouts.app')

@section('content')
<h1 style="font-size: 50; text-align: center;">HH!</h1>

@if($recipes->count())
    <div class="main-grid">
        @foreach($recipes as $recipe)
        <div class="main-grid-item">
            <div class="main-grid-item-title">
                <b>{{ $recipe->title }}</b>
            </div>
            <div class="main-grid-item-description">
                {{ $recipe->description }}
            </div>
            <div class="main-grid-item-prepTime">
                {{ $recipe->prepTime }}
            </div>
        </div>
        @endforeach
    </div>
@else
    <p style="text-align: center;">There are currently no recipes! :(</p>
@endif
@endsection
