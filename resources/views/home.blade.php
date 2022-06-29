@extends('layouts.app')

@section('content')
<title>Explore</title>
<div class="background">
    <h1 style="font-size: 50; text-align: center;">Explore recipes</h1>
    @can('isAdmin')
        <form action="/recipe/create" method="GET" class="form-add-new-recipe">
            @csrf
            <button type="submit" class="btn btn-primary">
                Add new recipe
            </button>
        </form>
        <form action="/category/create" method="GET" class="form-create-new-recipe">
            @csrf
            <button type="submit" class="btn btn-primary">
                Create new category
            </button>
        </form><br><br><br>
    @endcan

    @if($recipes->count())
        <div class="container-recipes">
            @foreach($recipes as $recipe)
                <a href="/recipe/{{ $recipe->id }}/show">
                    <div class="container-item">

                        <div class="recipe-photo">
                            <img src="/storage/{{ $recipe->photo }}">
                        </div>

                        <div class="recipe-likes">
                            @foreach ($likes as $like)
                                @if ($like->id == $recipe->id )
                                    {{ $like->liked_by_count }} likes
                                @endif
                            @endforeach 
                        </div>

                        <div class="like-form">
                            @can('isLoggedIn')
                                <form action="recipe/like/{{ $recipe->id }}" method="GET">
                                    @csrf
                                    <button type="submit" class="btn btn-outline-primary">
                                        Like
                                    </button>
                                </form>
                            @endcan
                        </div>
                            
                        <div class="recipe-title">
                            <b>{{ $recipe->title }}</b>
                        </div>
                        <div class="recipe-description">
                            {{ $recipe->description }}
                        </div>
                        <div class="recipe-prepTime">
                            <b>Preparation time:</b> {{ $recipe->prepTime }} minutes
                        </div>

                        <div class="recipe-edit">
                            @can('isAdmin')
                                <form action="/recipe/{{$recipe->id}}/edit" method="GET">
                                    @csrf
                                    <button type="submit" class="btn btn-primary">
                                        Edit
                                    </button>
                                </form>
                            @endcan
                        </div>

                        <div class="recipe-delete">
                            @can('isAdmin')
                                <form action="/recipe/delete/{{$recipe->id}}" method="POST">
                                    @csrf
                                    @method('delete')
                                    <button type="submit" class="btn btn-danger">
                                        Delete
                                    </button>
                                </form>
                            @endcan
                        </div>

                    </div>
                </a>
            @endforeach
        </div>
    @else
        <p style="text-align: center;">There are currently no recipes! :(</p>
    @endif
</div>
@endsection