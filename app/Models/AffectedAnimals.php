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

    public function municipality()
    {
        return $this->belongsTo(Municipality::class, 'municipality_id');
    }

    public function animal()
    {
        return $this->belongsTo(Animal::class, 'animal_id');
    }
}
