<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Undangan extends Model
{
    use HasFactory;
    protected $table = "undangans";
    protected $fillable = [
        'id_user',
        'tittle',
        'featured_image',
        'person_1_name',
        'person_2_name',
        'person_1_image',
        'person_2_image',
        'desc_person_1',
        'desc_person_2',
        'desc_wedding',
        'wedding_date',
        'wedding_location'
    ];
}
