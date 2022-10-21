<?php

namespace App\Http\Controllers;

use App\Models\Ingredient;
use Illuminate\Http\Request;

class IngredientsController extends Controller
{
    public function store(){
        $data = request()->validate([
            'ingredientName' => 'required',
        ]);

        Ingredient::firstOrCreate(['ingredientName' => $data['ingredientName']]);
        return redirect('/recipe/create');
    }
}
