<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Instructor extends Model
{
    protected $fillable = [
        'user_id', 'number', 'is_active', 'note',
    ];

    protected $casts = [
        'is_active' => 'boolean',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function drivingLessons()
    {
        return $this->hasMany(DrivingLesson::class);
    }

    public function exams()
    {
        return $this->hasMany(Exam::class);
    }
}
