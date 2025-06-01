<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Invoice extends Model
{
    protected $fillable = [
        'registration_id', 'invoice_number', 'invoice_date', 'amount_excl_vat',
        'vat', 'amount_incl_vat', 'status', 'is_active', 'note',
    ];

    protected $casts = [
        'invoice_date' => 'date',
        'amount_excl_vat' => 'decimal:2',
        'vat' => 'decimal:2',
        'amount_incl_vat' => 'decimal:2',
        'is_active' => 'boolean',
    ];


    //role
    public function user()
    {
        return $this->hasOneThrough(
            User::class,
            Registration::class,
            'id',         // Foreign key on Registration table...
            'id',         // Foreign key on User table...
            'registration_id', // Local key on Invoice table...
            'user_id'         // Local key on Registration table...
        );
    }
    // ^^^^

    public function registration()
    {
        return $this->belongsTo(Registration::class);
    }

    public function payments()
    {
        return $this->hasMany(Payment::class);
    }
}
