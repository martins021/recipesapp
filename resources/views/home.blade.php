@extends('layouts.app')

@section('content')
<h1 style="font-size: 50; text-align: center;">HH!</h1>
<a href="/recipe/create">Add new recipe</a>

@if($recipes->count())
    <div class="container-recipes">
        @foreach($recipes as $recipe)
        <div class="container-item">
            <img src="/storage/{{ $recipe->photo }}" class="w-50" class="recipe-photo">
            <b>{{ $recipe->title }}</b><br>
            {{ $recipe->description }}
            {{ $recipe->prepTime }}                
        </div>
        @endforeach
    </div>
@else
    <p style="text-align: center;">There are currently no recipes! :(</p>
@endif
@endsection
