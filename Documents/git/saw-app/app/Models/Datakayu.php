<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Datakayu extends Model
{
    use HasFactory;

    protected $table = 'datakayu';
    protected $fillable = ['alternatif','c1','c2','c3','c4','c5'];
}
