<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    use HasFactory;
    protected $table = "trx";
    protected $fillable = [
        'id_user',
        'id_undangan',
        'keyword',
        'date_start',
        'date_end'
    ];
}