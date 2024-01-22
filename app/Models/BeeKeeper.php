<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BeeKeeper extends Model
{
    use HasFactory;

    protected $table = 'bee_keepers';

    protected $fillable = [
        'municipality_id',
        'colonies',
        'bee_keepers',
        'year',
    ];
}
