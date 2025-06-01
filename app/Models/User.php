<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Spatie\Permission\Traits\HasRoles;

class User extends Authenticatable
{
    use Notifiable, HasRoles;

    protected $fillable = [
        'first_name', 'middle_name', 'last_name', 'birth_date',
        'username', 'email', 'password', 'is_logged_in', 'logged_in_at',
        'logged_out_at', 'is_active', 'note',
    ];

    protected $hidden = ['password', 'remember_token'];

    protected $casts = [
        'birth_date' => 'date',
        'is_logged_in' => 'boolean',
        'is_active' => 'boolean',
        'logged_in_at' => 'datetime',
        'logged_out_at' => 'datetime',
    ];


    public function getFullNameAttribute()
    {
        return trim("{$this->first_name} {$this->middle_name} {$this->last_name}");
    }

    // Relations
    public function contacts()
    {
        return $this->hasMany(Contact::class);
    }

    public function student()
    {
        return $this->hasOne(Student::class);
    }

    public function instructor()
    {
        return $this->hasOne(Instructor::class);
    }

    public function notifications()
    {
        return $this->hasMany(Notification::class);
    }
}
