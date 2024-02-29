<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class FishProductionArea extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'fish_production_areas';

    protected $fillable = [
        'fish_production_id',
        'year',
        'land_area',
    ];

    protected $softDeleteColumn = 'deleted_at'; 
}
