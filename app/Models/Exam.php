<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Exam extends Model
{
    protected $fillable = [
        'registration_id', 'instructor_id', 'start_date', 'start_time', 'end_date',
        'end_time', 'location', 'result', 'is_active', 'comment',
    ];

    protected $casts = [
        'start_date' => 'date',
        // 'start_time' => 'time', ❌ Laravel doesn't support this
        'end_date' => 'date',
        // 'end_time' => 'time', ❌ Laravel doesn't support this
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

    // Optional accessors (if you want Carbon for time fields)
    public function getStartTimeAttribute($value)
    {
        return \Carbon\Carbon::createFromFormat('H:i:s', $value);
    }

    public function getEndTimeAttribute($value)
    {
        return \Carbon\Carbon::createFromFormat('H:i:s', $value);
    }
}
