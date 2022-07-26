<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ingredient extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function recipesIng(){ // one-to-many relationship ar Categories tabulu
        return $this->belongsToMany(Recipe::class);
    }
}
