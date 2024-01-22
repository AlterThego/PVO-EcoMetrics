<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FishProductionArea extends Model
{
    use HasFactory;

    protected $table = 'fish_production_areas';

    protected $fillable = [
        'fish_production_id',
        'year',
        'land_area',
    ];
}
