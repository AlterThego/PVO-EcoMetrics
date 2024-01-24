<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class Municipality extends Model
{
    use HasFactory;
    protected $table = 'municipalities';

    protected $fillable = [
        'municipality_name',
        'zip_code',
        'land_area',
    ];

    public function animalPopulations()
    {
        return $this->hasMany(AnimalPopulation::class, 'municipality_id');
    }
}