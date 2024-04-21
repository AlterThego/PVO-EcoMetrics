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
        'municipality_id',
        'barangay_id',
        'land_area',
    ];

    protected $softDeleteColumn = 'deleted_at';

    public function municipality()
    {
        return $this->belongsTo(Municipality::class, 'municipality_id');
    }

    public function barangay()
    {
        return $this->belongsTo(Barangay::class, 'barangay_id');
    }

    public function fish_production()
    {
        return $this->belongsTo(FishProduction::class, 'fish_production_id');
    }
}
