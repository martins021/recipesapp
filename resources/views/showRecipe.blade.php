@extends('layouts.app')

@section('content')
<title>{{$recipe->title}}</title>
<h1 style="font-size: 50; text-align: center;">{{$recipe->title}}</h1>

{{-- RECIPE INFO --}}
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
        <a href="{{ route('search', ['category' => $category->categoryName]) }}" class="show-categories">{{$category->categoryName}}</a>
    @endforeach
    <div class="show-likes">
        @foreach ($likes as $like)
            @if ($like->id == $recipe->id )
                {{ $like->liked_by_count }} likes
            @endif
        @endforeach 
    </div>
</div>

<div class="comment-container">
    <h3><strong>Comments</strong></h3>
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
                            <div class="comment-title">
                                <h5 class="comment-info">{{ $user->name }}</h5>
                                <p>at {{ $comment->created_at }}</p>
                            </div>
                            <p>{{ $comment->content }}</p>
                        @endif
                    @endforeach
                @endif
            @empty
                <p>There are currently no comments</p>
            @endforelse
        </div>
    </div>
</div>
@endsection