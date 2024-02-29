<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class FishSanctuary extends Model
{
    use HasFactory, SoftDeletes;


    protected $table = 'fish_sanctuaries';

    protected $fillable = [
        'barangay_id',
        'year',
        'land_area',
    ];
    protected $softDeleteColumn = 'deleted_at'; 
}
