@extends('layouts.app')

@section('content')
<h1 style="font-size: 50; text-align: center;">Explore recipes</h1>
@can('isAdmin')
    <a href="/recipe/create">Add new recipe </a>&nbsp&nbsp&nbsp
    <a href="/category/create"> Create new category</a>
@endcan

@if($recipes->count())
    <div class="container-recipes">
        @foreach($recipes as $recipe)
        <div class="container-item">
            <img src="/storage/{{ $recipe->photo }}" class="w-50" class="recipe-photo">
            <b>{{ $recipe->title }}</b><br>
            {{ $recipe->description }}
            {{ $recipe->prepTime }}
            @can('isAdmin')
                <a href="/recipe/{{$recipe->id}}/edit">Edit</a>
            @endcan
            @can('isAdmin')
                <a href="recipe/delete/{{$recipe->id}}">Delete</a>
            @endcan
            @can('isLoggedIn')
                <a href="recipe/like/{{ $recipe->id }}">Like</a>
            @endcan
            @foreach ($likes as $like)
                @if ($like->id == $recipe->id )
                    {{ $like->liked_by_count }}
                @endif
            @endforeach
        </div>
        @endforeach
    </div>
@else
    <p style="text-align: center;">There are currently no recipes! :(</p>
@endif
@endsection