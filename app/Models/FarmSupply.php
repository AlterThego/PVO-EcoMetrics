<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FarmSupply extends Model
{
    use HasFactory;

    protected $table = 'farm_supplies';

    protected $fillable = [
        'municipality_id',
        'colonies',
        'bee_keepers',
        'year',
    ];
}
