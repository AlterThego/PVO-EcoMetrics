<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AffectedAnimals extends Model
{
    use HasFactory;

    protected $table = 'affected_animals';

    protected $fillable = [
        'municipality_id',
        'animal_id',
        'year',
        'count',
    ];
}
