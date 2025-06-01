<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Car extends Model
{
    protected $fillable = [
        'brand', 'model', 'license_plate', 'fuel_type', 'is_active', 'note',
    ];

    protected $casts = [
        'is_active' => 'boolean',
    ];

    public function drivingLessons()
    {
        return $this->hasMany(DrivingLesson::class);
    }
}
