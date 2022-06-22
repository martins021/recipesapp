<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Like extends Model
{
    use HasFactory;

    public function user(){ // one-to-many relationship ar Users tabulu
        return $this->belongsTo(User::class);
    }

    public function recipe(){  // one-to-many relationship ar Recipes tabulu
        return $this->belongsTo(Recipe::class);
    }
}
