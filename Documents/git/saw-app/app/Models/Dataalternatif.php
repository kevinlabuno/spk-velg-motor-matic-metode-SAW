<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Dataalternatif extends Model
{
    use HasFactory;

    protected $table = 'dataalternatif';
    protected $fillable = ['alternatif','c1','c2','c3','c4','c5','c6'];
}
