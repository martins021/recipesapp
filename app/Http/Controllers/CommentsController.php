<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Comment;
use App\Models\Recipe;
use App\Models\User;
use Illuminate\Support\Facades\DB; // pievienots

class CommentsController extends Controller
{
    public function showRecipe($id){
        $recipe = Recipe::find($id);
        $categories = Recipe::with('categories')->get();
        $comments = DB::table('comments')
            ->orderBy('created_at', 'desc')
            ->get();
        $users = User::all();
        $likes = Recipe::withCount('likedBy')->get();
        return view('showRecipe', [
            'recipe' => $recipe,
            'categories' => $categories,
            'comments' => $comments,
            'users' => $users,
            'likes' => $likes,
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
