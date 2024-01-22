<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AnimalPopulation extends Model
{
    use HasFactory;

    protected $table = 'animal_population';

    protected $fillable = [
        'municipality_id',
        'animal_id',
        'animal_type_id',
        'year',
        'animal_population_count',
        'volume',
    ];
}