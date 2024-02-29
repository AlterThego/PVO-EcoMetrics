<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class FishProduction extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'fish_productions';

    protected $fillable = [
        'type',
    ];

    protected $softDeleteColumn = 'deleted_at'; 
    public function setTypeAttribute($value)
    {
        $this->attributes['type'] = ucfirst(strtolower($value));
    }
}
