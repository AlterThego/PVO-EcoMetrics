<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Farm extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'farms';

    protected $fillable = [
        'municipality_id',
        'level',
        'farm_name',
        'farm_area',
        'farm_sector',
        'farm_type',
        'year_established',
        'year_closed',
    ];

    protected $softDeleteColumn = 'deleted_at';

    public function municipality()
    {
        return $this->belongsTo(Municipality::class, 'municipality_id');
    }
}
