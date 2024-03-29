@extends('layouts.app')

@section('content')
<title>Create recipe</title>
<div class="container">
    <form action="/r" enctype="multipart/form-data" method="post">
        @csrf
        <div class="row">
            <div class="col-8 offset-2">
                <div class="row">
                    <h1>Create new recipe</h1>
                </div>

                <div class="row mb-3">
                    <label for="title" class="createRecipeLabel col-md-4 col-form-label">Recipe title</label>

                    <input id="title"
                        type="text"
                        class="form-control @error('title') is-invalid @enderror"
                        name="title" 
                        value="{{ old('title') }}" 
                        autocomplete="title" autofocus> <!-- old('title') nozīmē, ja ir input kļūda, tad rakstot vēlreiz iepriekš ierakstītais saglabāsies -->

                    @error('title')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>

                <div class="row mb-3">
                    <label for="description" class="createRecipeLabel col-md-4 col-form-label">Description</label>

                    <textarea id="description"
                        name="description" 
                        rows="4" cols="50" 
                        class="form-control @error('description') is-invalid @enderror">{{ old('description') }}
                    </textarea>
                        
                    @error('description')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>

                <div class="row mb-3">
                    <label for="ingredients" class="createRecipeLabel col-md-4 col-form-label">Ingredients</label>

                    <table>
                        @foreach ($ingredients as $ingredient)
                            <tr>
                                <td class="ingredient-row">
                                    <input id="{{ $ingredient->id }}"
                                        type="checkbox"
                                        class="ingredient-enable">
                                </td>
                                <td>{{ $ingredient->ingredientName }}</td>
                                <td class="col-6">
                                    <input type="text"
                                        id="ingredients[{{ $ingredient->id }}]"
                                        class="ingredient-amount form-control"
                                        placeholder="Amount"
                                        disabled>
                                </td> 
                            </tr>
                        @endforeach
                    </table>
                </div>

                <div class="row mb-3">
                    <label for="prepTime" class="createRecipeLabel col-md-4 col-form-label">Preparation time</label>

                    <input id="prepTime"
                        type="number"
                        class="form-control @error('prepTime') is-invalid @enderror"
                        name="prepTime" 
                        value="{{ old('prepTime') }}" 
                        autocomplete="prepTime" autofocus>

                    @error('prepTime')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>

                <div class="row mb-3">
                    <label for="category" class="createRecipeLabel col-md-4 col-form-label">Category</label>
                        <select name="category[]" id="category" class="form-control @error('prepTime') is-invalid @enderror" multiple="multiple" size="5">
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
                        <label for="photo" class="createRecipeLabel col-md-4 col-form-label">Upload image</label>
                        <input type="file" class="form-control-file" id="photo" name="photo">
                        @error('photo')
                                <strong>{{ $message }}</strong>
                        @enderror
                </div>  
        </div><br>
        <button class="btn btn-primary p-2 col-8 offset-2">Upload recipe</button>
    </form>

    <form action="/a" enctype="multipart/form-data" method="post">
        @csrf
        <div class="row mt-4 col-8 offset-2">
            <div>
                <label for="ingredientName" class="createRecipeLabel col-md-4 col-form-label">Add a new ingredient</label>
            </div>

            <input id="ingredientName"
                type="text"
                class="form-control @error('ingredientName') is-invalid @enderror"
                name="ingredientName" 
                value="{{ old('ingredientName') }}"
                style="width: 30%"
                autocomplete="ingredientName" autofocus> <!-- old('title') nozīmē, ja ir input kļūda, tad rakstot vēlreiz iepriekš ierakstītais saglabāsies -->

            @error('ingredientName')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
                
            <button class="btn btn-primary p-2 col-1 mt-1.7" style="margin-left: 10px">Add</button>
        </div>
    </form>
</div>

<script>

    var ingredients = document.getElementsByClassName("ingredient-row"); // gets html collection

    for(let ingredient of ingredients){ 

        ingredient.addEventListener('click', function(){ // adds click listener to each row
            let ingredient_checkbox = ingredient.children[0]; // accesses checkbox of each element (1st child)
            let amountField = document.getElementById(`ingredients[${ingredient_checkbox.id}]`); // gets input field by name and enables it

            if(ingredient_checkbox.checked){
                amountField.disabled = true;
                ingredient_checkbox.checked = false;
            }else{
                amountField.disabled = false;
                ingredient_checkbox.checked = true;
            }
        });
    }
    // same exact loop but click event is set to checkbox itself instead of parent element (otherwise checkbox doesn't work)
    for(let ingredient of ingredients){ 
        let ingredient_checkbox = ingredient.children[0]; // accesses checkbox of each element (1st child)
        ingredient_checkbox.addEventListener('click', function(){ // adds click listener to each row
            let amountField = document.getElementById(`ingredients[${ingredient_checkbox.id}]`); // gets input field by name and enables it

            if(ingredient_checkbox.checked){
                amountField.disabled = true;
                ingredient_checkbox.checked = false;
            }else{
                amountField.disabled = false;
                ingredient_checkbox.checked = true;
            }
        });
    }

</script>

<style>
    .createRecipeLabel{
        font-weight: bold;
    }
</style>

@endsection
