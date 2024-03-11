<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
class Barangay extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'barangays';

    protected $fillable = [
        'municipality_id',
        'barangay_name',
    ];
    protected $softDeleteColumn = 'deleted_at'; 

    public function municipality()
    {
        return $this->belongsTo(Municipality::class, 'municipality_id');
    }

}
