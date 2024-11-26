<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Datakonver extends Model
{
    use HasFactory;
    protected $table = 'datakonver';
    protected $fillable = ['alternatif','c1','c2'
    ,'c3','c4','c5','c6','v'];
}
