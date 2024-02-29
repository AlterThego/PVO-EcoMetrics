<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Municipality extends Model
{
    use HasFactory, SoftDeletes;
    protected $table = 'municipalities';

    protected $fillable = [
        'municipality_name',
        'zip_code',
        'land_area',
    ];

    protected $softDeleteColumn = 'deleted_at'; 

    public function setMunicipalityNameAttribute($value)
    {
        $this->attributes['municipality_name'] = ucfirst(strtolower($value));
    }

    public function animalPopulations()
    {
        return $this->hasMany(AnimalPopulation::class, 'municipality_id');
    }
}