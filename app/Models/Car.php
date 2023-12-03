<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Car extends Model
{
    use HasFactory;

    protected $fillable = [
        'model',
        'max_speed',
        'horse_power',
        'engine_volume',
        'year_of_manufacture',
    ];

    public function champion() {
        return $this->belongsTo(Champion::class);
    }
}
