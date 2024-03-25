<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class AnimalType extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'animal_type';

    protected $fillable = [
        // 'animal_id',
        'type',
    ];
    
    protected $softDeleteColumn = 'deleted_at'; 
    // public function animal()
    // {
    //     return $this->belongsTo(AnimalType::class, 'animal_id');
    // }

    // public function animal_type()
    // {
    //     return $this->belongsTo(AnimalType::class, 'animal_type_id');
    // }

    // public function municipality()
    // {
    //     return $this->belongsTo(Municipality::class, 'municipality_id');
    // }
}
