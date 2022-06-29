@extends('layouts.app')

@section('content')
<title>{{$recipe->title}}</title>
<h1 style="font-size: 50; text-align: center;">{{$recipe->title}}</h1>
<div class="show-container">
    <img src="/storage/{{ $recipe->photo }}" class="w-100" class="recipe-photo">
    <br><br><h3><strong>Description</strong></h3>
    <p style="text-align: justify">{{$recipe->description}}</p>
    <h3><strong>Preparation time</strong></h3>
    <p>{{$recipe->prepTime}} minutes</p>
    <h3><strong>Ingredients</strong></h3> 
    <p>{{$recipe->ingredients}}</p>
    <h3><strong>Categories</strong></h3>
    @foreach ($recipe->categories as $category)
        <span>{{$category->categoryName}}</span>
    @endforeach
</div>
<div class="comment-container">
    <h3><strong>Comments</strong></h3>
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
        <div class="comments-container">
            <div class="comments-item">
                @foreach ($comments as $comment)
                    <p>{{ $comment->content }}</p>
                    {{ $comment->created_at }}
                    {{ auth()->user($comment->user_id)->name }}
                @endforeach
            </div>
        </div>
    @endcan
</div>
@endsection