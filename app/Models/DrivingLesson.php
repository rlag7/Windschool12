<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class DrivingLesson extends Model
{
    protected $fillable = [
        'registration_id', 'instructor_id', 'car_id', 'start_date', 'start_time',
        'end_date', 'end_time', 'lesson_status', 'goal', 'student_comment',
        'instructor_comment', 'is_active', 'comment',
    ];

    protected $casts = [
        'start_date' => 'date',
        'end_date' => 'date',
        'is_active' => 'boolean',
    ];

    public function registration()
    {
        return $this->belongsTo(Registration::class);
    }

    public function instructor()
    {
        return $this->belongsTo(Instructor::class);
    }

    public function car()
    {
        return $this->belongsTo(Car::class);
    }

    public function pickupAddresses()
    {
        return $this->belongsToMany(PickupAddress::class, 'driving_lesson_pickup_address')
            ->withPivot('is_active', 'note')
            ->withTimestamps();
    }
}
