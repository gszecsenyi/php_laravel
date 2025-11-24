<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class ApartmentHouse extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'address',
        'description',
        'number_of_rooms',
        'max_guests',
        'price_per_night',
        'is_available',
    ];

    protected $casts = [
        'is_available' => 'boolean',
        'price_per_night' => 'decimal:2',
    ];

    public function bookings(): HasMany
    {
        return $this->hasMany(Booking::class);
    }
}
