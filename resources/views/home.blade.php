@extends('layouts.app')

@section('content')
<title>Explore</title>
<button class="open-search">
    Filter 
    <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="currentColor" class="bi bi-arrow-down" viewBox="0 0 16 16">
        <path fill-rule="evenodd" d="M8 1a.5.5 0 0 1 .5.5v11.793l3.146-3.147a.5.5 0 0 1 .708.708l-4 4a.5.5 0 0 1-.708 0l-4-4a.5.5 0 0 1 .708-.708L7.5 13.293V1.5A.5.5 0 0 1 8 1z"/>
    </svg>
</button>
<div class="search">
    <div class="search-form">
        <h3 style="color: blueviolet">Filter recipes</h3>
        <form method="GET" action="{{ url('home/filter/') }}">
            @csrf
            <input type="text" placeholder="Title" name="title" id="title">    
            <input type="text" placeholder="Time" name="prepTime" id="time">
            <input type="text" placeholder="Ingredients" name="ingredients" id="ingredients">       
            <select name="category" id="category" aria-placeholder="Category"> 
                <option value="" disabled selected hidden>Category</option>           
                @foreach($categories as $category)
                    <option value="{{ $category->id }}"> {{ $category->categoryName }}</option>
                @endforeach
            </select>
            <input id="filter-btn" type="submit" value="Filter">
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

<script>
    const largeBtn = document.querySelector(".open-search");
    const searchForm = document.querySelector(".search");

    window.addEventListener("DOMContentLoaded", function () {
        searchForm.style.display = "none";
    });

    largeBtn.addEventListener('click', function(){
        console.log(searchForm.style.display); 
        if(searchForm.style.display == "none"){
            searchForm.style.display = "block";
        } else {
            searchForm.style.display = "none";
        }
    });
</script>
@endsection