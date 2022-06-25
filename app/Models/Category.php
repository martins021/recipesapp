<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function recipes(){ // one-to-many relationship ar Categories tabulu
        return $this->belongsToMany(Recipe::class);
    }
}
