@extends('layouts.app')

@section('content')
<title>Update</title>
<div class="container">
    <form action="/recipe/{{$recipe->id}}/update" enctype="multipart/form-data" method="post">
        @csrf
        @method('PATCH')
        <div class="row">
            <div class="col-8 offset-2">
                <div class="row">
                    <h1>Edit recipe</h1>
                </div>

                <div class="row mb-3">
                    <label for="title" class="col-md-4 col-form-label">Recipe title</label>

                    <input id="title"
                        type="text"
                        class="form-control @error('title') is-invalid @enderror"
                        name="title" 
                        value="{{ old('title') ?? $recipe->title }}" 
                        placeholder="{{$recipe->title}}"
                        autocomplete="title" autofocus>

                    @error('title')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>

                <div class="row mb-3">
                    <label for="description" class="col-md-4 col-form-label">Description</label>

                    <textarea id="description"
                        name="description" 
                        rows="4" cols="50" 
                        placeholder="{{$recipe->description}}"
                        class="form-control @error('description') is-invalid @enderror">{{ $recipe->description }}
                    </textarea>
                        
                    @error('description')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>

                <div class="row mb-3">
                    <label for="ingredients" class="col-md-4 col-form-label">Ingredients</label>

                    <input id="ingredients"
                        type="text"
                        class="form-control @error('ingredients') is-invalid @enderror"
                        name="ingredients" 
                        value="{{ old('ingredients') ?? $recipe->ingredients}}" 
                        placeholder="{{$recipe->ingredients}}"
                        autocomplete="ingredients" autofocus>

                    @error('ingredients')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>

                <div class="row mb-3">
                    <label for="prepTime" class="col-md-4 col-form-label">Preparation time</label>

                    <input id="prepTime"
                        type="number"
                        class="form-control @error('prepTime') is-invalid @enderror"
                        name="prepTime" 
                        value="{{ old('prepTime') ?? $recipe->prepTime}}" 
                        placeholder="{{$recipe->prepTime}}"
                        autocomplete="prepTime" autofocus>

                    @error('prepTime')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>

                <div class="row mb-3">
                    <label for="category" class="col-md-4 col-form-label">Category</label>
                        <select name="category[]" id="category" class="form-control @error('category') is-invalid @enderror" multiple="multiple" size="5">
                        @foreach($categories as $category)
                            <option value="{{ $category->id }}"> {{ $category->categoryName }}</option>
                        @endforeach
                        </select>

                    @error('category')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>

            </div>
                <div class="row col-8 offset-2">
                        <label for="photo" class="col-md-4 col-form-label">Change image</label>
                        <input type="file" class="form-control-file" id="photo" name="photo">
                        @error('photo')
                                <strong>{{ $message }}</strong>
                        @enderror
                </div>  
        </div><br>
        <button class="btn btn-primary p-2 col-8 offset-2">Save recipe</button>
    </form>
</div>
@endsection