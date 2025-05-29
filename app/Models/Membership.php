<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Membership extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'role',
        'status',
        'join_date',
    ];

    protected $casts = [
        'join_date' => 'date',
    ];

    /**
     * Get the user that owns the membership.
     */
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
