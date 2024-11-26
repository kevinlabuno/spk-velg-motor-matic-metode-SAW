<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Data extends Model
{
    use HasFactory;

    protected $table = 'data';
    protected $fillable = ['alternatif','c1','c2'
    ,'c3','c4','c5','c6','v'];
}
