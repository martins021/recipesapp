<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use Illuminate\Http\Request;
use App\Models\Recipe;
use Illuminate\Support\Facades\DB; // pievienots

class CommentsController extends Controller
{
    public function showRecipe($id){
        $recipe = Recipe::find($id);
        $categories = Recipe::with('categories')->get();
        $comments = Comment::all();
        return view('showRecipe', [
            'recipe' => $recipe,
            'categories' => $categories,
            'comments' => $comments,
        ]);
    }

    public function store($recipe_id){
        $id = auth()->user()->id;
        $data = request()->validate([
            'comment' => 'required',
        ]);

        $comment = new Comment();
        $comment->user_id = $id;
        $comment->recipe_id = $recipe_id;
        $comment->content = $data['comment'];
        $comment->save();

        return redirect('recipe/'.$recipe_id.'/show');
    }
}
