<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Population extends Model
{
    use HasFactory;

    protected $table = 'populations';

    protected $fillable = [
        'municipality_id',
        'census_year',
        'population_count',
    ];
}
