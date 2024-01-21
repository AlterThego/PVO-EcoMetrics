<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Animal extends Model
{
    use HasFactory;

    protected $table = 'animal';

    protected $fillable = [
        'animal_id',
        'animal_name',
        'type',
    ];

    // If you don't want timestamps, you can set it to false
    public $timestamps = true;

    // You can customize the timestamp column names if needed
    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';

    // You may want to define other relationships or methods here
}
