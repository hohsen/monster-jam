<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Champion extends Model
{
    use HasFactory;

    protected $fillable = [
        'car_id',
        'name',
        'surname',
        'biography',
        'photo',
    ];

    public function cars() {
        return $this->hasMany(Car::class);
    }
}
