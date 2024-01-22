<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FishProduction extends Model
{
    use HasFactory;

    protected $table = 'fish_productions';

    protected $fillable = [
        'type',
    ];
}
