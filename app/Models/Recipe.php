<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Recipe extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function likes(){ // one-to-many relationship ar Likes tabulu
        return $this->hasMany(Recipe::class)->orderBy('created_at','DESC');
    }

    public function categories(){ // one-to-many relationship ar Categories tabulu
        return $this->belongsToMany(Category::class);
    }
}
