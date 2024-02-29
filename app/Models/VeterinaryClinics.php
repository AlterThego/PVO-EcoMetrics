<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class VeterinaryClinics extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'veterinary_clinics';

    protected $fillable = [
        'municipality_id',
        'sector',
        'clinic_name',
        'year_established',
        'year_closed',
    ];

    protected $softDeleteColumn = 'deleted_at'; 
}
