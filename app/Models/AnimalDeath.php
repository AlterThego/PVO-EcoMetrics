<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AnimalDeath extends Model
{
    use HasFactory;

    protected $table = 'animal_deaths';

    protected $fillable = [
        'municipality_id',
        'animal_id',
        'year',
        'count',
    ];

    public function animal()
    {
        return $this->belongsTo(Animal::class, 'animal_id');
    }
}