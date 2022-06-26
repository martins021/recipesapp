<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    use HasFactory;

    public function user(){ // one-to-many relationship ar Users tabulu
        return $this->belongsTo(User::class);
    }
}
