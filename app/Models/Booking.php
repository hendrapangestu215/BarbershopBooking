<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Booking extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'service_id',
        'hairstyle_id',
        'date',
        'time',
        'barber_id',
        'status',
        'booking_id',
        'special_requests',
    ];

    protected static function boot()
    {
        parent::boot();

        // Create booking_id before saving
        static::creating(function ($model) {
            // Get the latest booking
            $latestBooking = self::latest()->first();

            // Generate the booking_id
            if (!$latestBooking) {
                // If no bookings exist, start with BK-0001
                $model->booking_id = 'BK-0001';
            } else {
                // Extract the numeric part, increment it, and pad it with zeros
                $lastNumber = intval(substr($latestBooking->booking_id, 3));
                $model->booking_id = 'BK-' . str_pad($lastNumber + 1, 4, '0', STR_PAD_LEFT);
            }
        });
    }

    /**
     * Get the user associated with the booking.
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    /**
     * Get the service associated with the booking.
     */
    public function service()
    {
        return $this->belongsTo(Service::class);
    }

    /**
     * Get the hairstyle associated with the booking.
     */
    public function hairstyle()
    {
        return $this->belongsTo(Hairstyle::class);
    }

    public function barber()
    {
        return $this->belongsTo(Barber::class);
    }
}
