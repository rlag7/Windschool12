<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Package extends Model
{
    protected $fillable = [
        'type', 'lesson_count', 'price_per_lesson', 'is_active', 'note',
    ];

    protected $casts = [
        'price_per_lesson' => 'decimal:2',
        'is_active' => 'boolean',
    ];

    public function registrations()
    {
        return $this->hasMany(Registration::class);
    }
}
