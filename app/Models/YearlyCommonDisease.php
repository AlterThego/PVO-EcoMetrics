<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class YearlyCommonDisease extends Model
{
    use HasFactory, SoftDeletes;


    protected $table = 'yearly_common_diseases';

    protected $fillable = [
        'disease_id',
        'year',
        'disease_count',
    ];
    
    protected $softDeleteColumn = 'deleted_at'; 

    public function disease()
    {
        return $this->belongsTo(Disease::class, 'disease_id');
    }
}
