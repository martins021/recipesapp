<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Recipe;
use App\Models\User;
use Illuminate\Support\Facades\Gate; // pievienots

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    function index(){
        $likes = Recipe::withCount('likedBy')->get(); // iegust laikotās receptes
        $recipes = Recipe::all();
        return view("home", [
            'recipes' => $recipes,
            'likes' => $likes,
        ]);
    }
    
    public function filter(Request $request){
        $likes = Recipe::withCount('likedBy')->get();
        $filteredRecipes = Recipe::where('title','LIKE', '%'.$request->title.'%')
                            ->where('prepTime','LIKE', '%'.$request->prepTime.'%')
                            ->where('ingredients','LIKE', '%'.$request->ingredients.'%')
                            ->get();
        return view('homeFilter', [
            'filteredRecipes' => $filteredRecipes,
            'likes' => $likes,
        ]);
    }
}
