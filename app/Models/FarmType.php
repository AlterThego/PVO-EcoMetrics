<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class FarmType extends Model
{
    use HasFactory, SoftDeletes;
    protected $table = 'farm_type';

    protected $fillable = [
        'type',
    ];

    protected $softDeleteColumn = 'deleted_at';

    // public function setTypeAttribute($value)
    // {
    //     $this->attributes['type'] = ucfirst(strtolower($value));
    // }
}
