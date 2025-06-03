<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    use HasFactory;

    protected $fillable = [
        'organizer_id',
        'title',
        'description',
        'image',
        'date',
        'venue',
        'budget',
        'status',
    ];

    protected $casts = [
        'date' => 'datetime',
        'budget' => 'decimal:2',
    ];

    public function organizer()
    {
        
        return $this->belongsTo(User::class, 'organizer_id');
    }

    public function bookings()
    {
        return $this->hasMany(ArtistBooking::class);
    }
} 