<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Recipe;
use Illuminate\Support\Facades\DB; // pievienots

class RecipesController extends Controller
{
    public function __construct(){ // funkcija, kas nodrošina, ka šajā Controlerī tiek iekšā tikai logged in users
        $this->middleware('auth');
    }

    public function create(){
        return view('createRecipe');
    }

    public function store(){
        $data = request()->validate([
            'title' => 'required',
            'description' => 'required',
            'ingredients' => 'required',
            'prepTime' => 'required|integer|between:1,1440',
            'category' => 'required',
            'photo' => 'required|image', // attelam ir jabut tiesaam attelam
        ]);
 
        $imagePath = request('photo')->store('uploads', 'public');// tiek saglabats image path jeb cels kur atrodas image // image tiek saglabats upload mape
        
        $fill = DB::table('recipes')->insertGetId(array(
            'title' => $data['title'],
            'description' => $data['description'],
            'ingredients' => $data['ingredients'],
            'photo' => $imagePath, // attelam ir jabut tiesaam attelam
            'prepTime' => $data['prepTime'],
            'category' => $data['category'],
        ));

        return redirect('/home');
    }
}
