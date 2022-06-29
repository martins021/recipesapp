@extends('layouts.app')

@section('content')
<title>Create category</title>
<div class="container">
    <form action="/c" enctype="multipart/form-data" method="post">
        @csrf
        <div class="row">
            <div class="col-8 offset-2">
                <div class="row">
                    <h1>Create new category</h1>
                </div>
                <div class="row mb-3">
                    <label for="categoryName" class="col-md-4 col-form-label">Category</label>
                    <input id="categoryName"
                        type="text"
                        class="form-control @error('categoryName') is-invalid @enderror"
                        name="categoryName" 
                        value="{{ old('categoryName') }}" 
                        autocomplete="categoryName" autofocus>
                    @error('categoryName')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
            </div>
        </div><br>
        <button class="btn btn-primary p-2 col-8 offset-2">Upload recipe</button>
    </form>
</div>
@endsection