<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Http\Controllers\CategoryController;
use App\Models\Ingredient;
use Illuminate\Http\Request;
use App\Models\Recipe;
use Illuminate\Support\Facades\DB; // pievienots

class RecipesController extends Controller
{
    public function __construct(){ // funkcija, kas nodrošina, ka šajā Controlerī tiek iekšā tikai logged in users
        $this->middleware('auth');
    }

    public function create(){
        $categories = Category::all();
        $ingredients = Ingredient::all();
        return view('createRecipe', [ // atgriež createRecipe lapu
            'categories' => $categories,
            'ingredients' => $ingredients,
        ]);
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
        
        DB::table('recipes')->insertGetId(array(
            'title' => $data['title'],
            'description' => $data['description'],
            'ingredients' => $data['ingredients'],
            'photo' => $imagePath, // attelam ir jabut tiesaam attelam
            'prepTime' => $data['prepTime'],
        ));        

        $recipe_id = Recipe::orderBy('id', 'desc')->first(); // iegūst tikko izveidotās receptes objektu
        $recipe_id->categories()->attach($data['category']); // aizpilda many-to-many starptabulu

        return redirect('/home');
    }

    public function edit(Recipe $recipe){
        $categories = Category::all();
        return view('updateRecipe',[
            'recipe' => $recipe,
            'categories' => $categories,
        ]);
    }

    public function update(Recipe $recipe){

        $data = request()->validate([ // pārbauda ievadītos datus
            'title' => 'required',
            'description' => 'required',
            'ingredients' => 'required',
            'prepTime' => 'required|integer|between:1,1440',
            'photo' => 'image',
        ]);
        
        $categoryData = request()->validate([ // kategoriju pārbauda atsevišķi
            'category' => 'required',
        ]);
        //dd($categoryData);
        $recipe->categories()->sync($categoryData['category']); // ievieto datus starptabulā // sync() izdzēš visus iepriekšējos datus ar tādu id un atstāj tikai jaunos

        if(request('photo')){ // ja ir pievienots jauns foto, tad iegūst imagePath
            $imagePath = request('photo')->store('uploads', 'public');
            $recipe->update(array_merge( // ievada datus
                $data,
                ['photo' => $imagePath]
            ));
        } else {
            $recipe->update($data);
        }
        return redirect("/home");
    }

    public function destroy($id){ // lai izdzēstu recepti
        Recipe::findOrFail($id)->delete(); 
        return redirect('/home');
    }
}
