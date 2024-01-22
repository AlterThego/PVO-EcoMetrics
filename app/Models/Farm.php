<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Farm extends Model
{
    use HasFactory;

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
}
