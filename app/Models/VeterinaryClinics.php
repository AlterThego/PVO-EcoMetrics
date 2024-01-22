<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class VeterinaryClinics extends Model
{
    use HasFactory;

    protected $table = 'veterinary_clinics';

    protected $fillable = [
        'municipality_id',
        'sector',
        'clinic_name',
        'year_established',
        'year_closed',
    ];
}
