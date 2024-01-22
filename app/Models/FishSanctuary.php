<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FishSanctuary extends Model
{
    use HasFactory;

    protected $table = 'fish_sanctuaries';

    protected $fillable = [
        'barangay_id',
        'year',
        'land_area',
    ];
}
