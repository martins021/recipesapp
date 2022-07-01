@extends('layouts.app')

@section('content')
<title>Explore</title>
<div class="search">
    <div class="search-form">
        <h3 style="color: blueviolet">Filter recipes</h3>
        <form method="GET" action="{{ url('home/filter/') }}">
            @csrf
            <tr>
                <td>
                    <input type="text" placeholder="Title" name="title" id="title">
                </td>
                <td>
                    <input type="text" placeholder="Time" name="prepTime" id="time">
                </td>
                <td>
                    <input type="text" placeholder="Ingredients" name="ingredients" id="ingredients">
                </td>
            </tr>
            <input type="submit" value="Filter">
        </form>
    </div>
</div>
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

    @if($filteredRecipes->count())
        <div class="container-recipes">
            @foreach($filteredRecipes as $recipe)
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
                            <p><b>Preparation time:</b> {{ $recipe->prepTime }} minutes</p>
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
        <p style="text-align: center;">No recipes found :(</p>
    @endif
</div>
@endsection