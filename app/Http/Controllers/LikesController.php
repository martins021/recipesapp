<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

class LikesController extends Controller
{
    public function store(Request $recipe){
        $recipeID = (int)$recipe->id; // liked receptes id
        $userID = Auth::id(); // logged in lietotāja id
        $userObj = User::find($userID);

        if($userObj->likes()->detach($recipeID)){ // ja ir ielaikots tad noņem laiku
           $userObj->likes()->detach($recipeID);
        }else{
           $userObj->likes()->attach($recipeID); // citādāk pievieno laiku
        };
        return redirect('/home');
    }
}
