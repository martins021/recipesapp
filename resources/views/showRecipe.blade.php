@extends('layouts.app')
<link href="{{ asset('css/showRecipe.css') }}" rel="stylesheet">
@section('content')
<title>{{$recipe->title}}</title>

{{-- RECIPE INFO --}}
<div class="show-container">
    <div class="show-image">
        <img src="/storage/{{ $recipe->photo }}" class="w-100" class="recipe-photo">
    </div>
    <div class="show-title">
        <h1 style="font-weight: bold; font-size:50px; text-align: center;">{{$recipe->title}}</h1>
    </div>
    <div class="show-description">
        <h3><strong>Description</strong></h3>
        <p style="text-align: justify">{{$recipe->description}}</p>
    </div>
    <div class="show-ingredients">
        <h3><strong>Ingredients</strong></h3> 
        <p>{{$recipe->ingredients}}</p>
    </div>
    <div class="show-preptime">
        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-clock" viewBox="0 0 16 16">
            <path d="M8 3.5a.5.5 0 0 0-1 0V9a.5.5 0 0 0 .252.434l3.5 2a.5.5 0 0 0 .496-.868L8 8.71V3.5z"/>
            <path d="M8 16A8 8 0 1 0 8 0a8 8 0 0 0 0 16zm7-8A7 7 0 1 1 1 8a7 7 0 0 1 14 0z"/>
        </svg>
        <span>{{$recipe->prepTime}} minutes</span>
    </div>
    <div class="show-categories">
        <h3><strong>Categories</strong></h3>
        <div class="show-categories-container">
            @foreach ($recipe->categories as $category)
                <div class="show-categories-item">
                    <a href="{{ route('search', ['category' => $category->categoryName]) }}">{{$category->categoryName}}</a>
                </div>
            @endforeach
        </div>
    </div>
    <div class="show-likes">
        @foreach ($likes as $like)
            @if ($like->id == $recipe->id )
                {{ $like->liked_by_count }} likes
            @endif
        @endforeach 
    </div>
</div>

<div class="comment-container">
    <h3 style="margin-bottom: 50px"><strong>Comments</strong></h3>
    {{-- WRITE COMMENT --}}
    @can('isLoggedIn')
        <div class="write-comment">
            <form action="/w/{{ $recipe->id }}" enctype="multipart/form-data" method="post">
                @csrf
                <div class="row mb-3">
                    <label for="comment" class="col-md-4 col-form-label">Write a comment</label>
                    <input id="comment"
                        type="text"
                        class="form-control @error('comment') is-invalid @enderror"
                        id="write-comment"
                        name="comment"  
                        autocomplete="comment" autofocus>
                    @error('comment')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <button type="submit" class="btn btn-primary">Publish</button>
            </form>
        </div>
    @endcan   
     {{-- SHOW COMMENTS --}}
    <div class="comments-container">
        <div class="comments-item">
            @forelse ($comments as $comment)
                @if ($comment->recipe_id == $recipe->id)
                    @foreach ($users as $user)
                        @if ($user->id == $comment->user_id)
                            <div class="single-comment-container">
                                <div class="single-comment-item-user">
                                    <div class="comment-title">
                                        <h5 class="comment-info">{{ $user->name }}</h5>
                                    </div>
                                </div>
                                <div class="single-comment-item">
                                    <p id="comment-time">at {{ $comment->created_at }}</p>
                                </div>
                                <div class="single-comment-item">
                                    <p id="comment-content">{{ $comment->content }}</p>
                                </div>
                            </div>
                        @endif
                    @endforeach
                    <hr>
                @endif
            @empty
                <p>There are currently no comments</p>
            @endforelse
        </div>
    </div>
</div>
@endsection