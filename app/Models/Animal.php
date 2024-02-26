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

    public $timestamps = true;

    public function setAnimalNameAttribute($value)
    {
        $this->attributes['animal_name'] = ucfirst(strtolower($value));
    }

    public function animalPopulation()
    {
        return $this->hasMany(AnimalPopulation::class, 'animal_id');
    }
}
