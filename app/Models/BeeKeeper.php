<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class BeeKeeper extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'bee_keepers';

    protected $fillable = [
        'municipality_id',
        'barangay_id',
        'colonies',
        'bee_keepers',
        'year',
    ];

    protected $softDeleteColumn = 'deleted_at';

    public function municipality()
    {
        return $this->belongsTo(Municipality::class, 'municipality_id');
    }
    public function barangay()
    {
        return $this->belongsTo(Barangay::class, 'barangay_id');
    }
}
