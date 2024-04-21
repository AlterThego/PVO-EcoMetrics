<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class AnimalDeath extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'animal_deaths';

    protected $fillable = [
        'municipality_id',
        'barangay_id',
        'animal_id',
        'year',
        'count',
    ];

    protected $softDeleteColumn = 'deleted_at';

    public function animal()
    {
        return $this->belongsTo(Animal::class, 'animal_id');
    }

    public function municipality()
    {
        return $this->belongsTo(Municipality::class, 'municipality_id');
    }

    public function barangay()
    {
        return $this->belongsTo(Barangay::class, 'barangay_id');
    }
}