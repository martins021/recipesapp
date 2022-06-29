<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB; // pievienots

class CategoryController extends Controller
{
    public function create(){
        return view('createCategory');
    }

    public function store(){
        $data = request()->validate([
            'categoryName' => 'required',
        ]);

        Category::firstOrCreate(['categoryName' => $data['categoryName']]); // tiek izveidota jauna kategorija tikai tad, ja tāda vēl neeksistē
        return redirect('/home');
    }
    
}
