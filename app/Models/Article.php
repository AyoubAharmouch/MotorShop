<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\QueryException;

class Article extends Model
{
    use HasFactory;
    protected $fillable = [
        'titre',
        'prix',
        'image',
        'category',
        'solde',
    ];


}
