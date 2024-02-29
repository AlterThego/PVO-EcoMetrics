<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class AnimalPopulation extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'animal_population';

    protected $fillable = [
        'municipality_id',
        'animal_id',
        'animal_type_id',
        'year',
        'animal_population_count',
        'volume',
    ];
    protected $softDeleteColumn = 'deleted_at'; 
    public function municipality()
    {
        return $this->belongsTo(Municipality::class, 'municipality_id');
    }

    public function animal()
    {
        return $this->belongsTo(Animal::class, 'animal_id');
    }
    
}