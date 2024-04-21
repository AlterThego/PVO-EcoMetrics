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
        'barangay_id',
        'sector',
        'clinic_name',
        'year_established',
        'year_closed',
    ];

    public function municipality()
    {
        return $this->belongsTo(Municipality::class, 'municipality_id');
    }

    public function barangay()
    {
        return $this->belongsTo(Barangay::class, 'barangay_id');
    }
}
