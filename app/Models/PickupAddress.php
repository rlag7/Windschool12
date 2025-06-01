<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PickupAddress extends Model
{
    protected $fillable = [
        'street_name', 'house_number', 'addition', 'postal_code', 'city', 'is_active', 'note',
    ];

    protected $casts = [
        'is_active' => 'boolean',
    ];

    public function drivingLessons()
    {
        return $this->belongsToMany(DrivingLesson::class, 'driving_lesson_pickup_address')
            ->withPivot('is_active', 'note')
            ->withTimestamps();
    }
}
