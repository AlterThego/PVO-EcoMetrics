<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Animal extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'animal';

    protected $fillable = [
        'animal_name',
        'classification',
        'type',
    ];
    protected $softDeleteColumn = 'deleted_at'; 
    // public $timestamps = true;

    public function setAnimalNameAttribute($value)
    {
        $this->attributes['animal_name'] = ucfirst(strtolower($value));
    }

    public function animalPopulation()
    {
        return $this->hasMany(AnimalPopulation::class, 'animal_id');
    }

    public function animalType()
    {
        return $this->hasMany(AnimalType::class, 'animal_type_id');
    }
}
