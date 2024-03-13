<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
class Population extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'populations';

    protected $fillable = [
        'municipality_id',
        'census_year',
        'population_count',
    ];
    protected $softDeleteColumn = 'deleted_at'; 

    public function municipality()
    {
        return $this->belongsTo(Municipality::class, 'municipality_id');
    }
}
