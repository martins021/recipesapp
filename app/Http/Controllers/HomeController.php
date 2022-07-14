<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Recipe;
use App\Models\Category;
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
        $categories = Category::all();
        return view("home", [
            'recipes' => $recipes,
            'likes' => $likes,
            'categories' => $categories,
        ]);
    }
    
    public function filter(Request $request){
        $likes = Recipe::withCount('likedBy')->get();
        $categIdInt = (int)$request->category; // iegūst prasītās kategorijas id
        $category = Category::find($categIdInt); // atrod kategoriju tabulā
        $relatedRecipes = $category->recipes->pluck('id')->toArray(); // iegūst masīvu ar visām kategorijai atbilstošajām receptēm no pivot tabulas

        $filteredRecipes = Recipe::where('title','LIKE', '%'.$request->title.'%')
                            ->where('prepTime','LIKE', '%'.$request->prepTime.'%')
                            ->where('ingredients','LIKE', '%'.$request->ingredients.'%')
                            ->WhereIn('id', $relatedRecipes)
                            ->get();

        $titleQuery = $request->title;
        $prepTimeQuery = $request->prepTime;
        $ingredientsQuery = $request->ingredients;
        $categoryQuery = $category->categoryName;
        $categories = Category::all();
        
        return view('homeFilter', [
            'filteredRecipes' => $filteredRecipes,
            'likes' => $likes,
            'categories' => $categories,
            'titleQuery' => $titleQuery,
            'prepTimeQuery' => $prepTimeQuery,
            'ingredientsQuery' => $ingredientsQuery,
            'categoryQuery' => $categoryQuery,
        ]);
    }
}
