<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Animal extends Model
{
    use HasFactory;

    protected $table = 'animal';

    protected $fillable = [
        'animal_name',
        'classification',
        'type',
    ];

    // If you don't want timestamps, you can set it to false
    public $timestamps = true;

    public function animalPopulation()
    {
        return $this->hasMany(AnimalPopulation::class, 'animal_id');
    }
}
