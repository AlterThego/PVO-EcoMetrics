<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class YearlyCommonDisease extends Model
{
    use HasFactory;

    protected $table = 'yearly_common_diseases';

    protected $fillable = [
        'disease_id',
        'year',
    ];
}
