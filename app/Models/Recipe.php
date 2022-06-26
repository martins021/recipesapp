<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Recipe extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function categories(){ // one-to-many relationship ar Categories tabulu
        return $this->belongsToMany(Category::class);
    }

    public function likedBy(){ // many-to-many relationship ar Users tabulu
        return $this->belongsToMany(User::class);
    }
}
