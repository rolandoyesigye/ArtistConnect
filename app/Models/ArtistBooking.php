<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class ArtistBooking extends Model
{
    use HasFactory;

    protected $fillable = [
        'artist_id',
        'organizer_id',
        'event_title',
        'event_description',
        'date',
        'venue',
        'status',
        'fee',
    ];

    protected $casts = [
        'date' => 'datetime',
        'fee' => 'decimal:2',
    ];

    public function artist()
    {
        return $this->belongsTo(Artist::class);
    }

    public function organizer()
    {
        return $this->belongsTo(User::class, 'organizer_id');
    }
}
