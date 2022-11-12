<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Story extends Model
{
    use HasFactory;
    protected $table = "storys";
    protected $fillable = [
        'id_undangan',
        'title',
        'date',
        'images',
        'desc'
    ];
}
