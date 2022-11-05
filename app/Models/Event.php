<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    use HasFactory;
    protected $table = "events";
    protected $fillable = [
        'id_undangan',
        'tittle',
        'date_start',
        'date_end',
        'location',
        'desc'
    ];
}