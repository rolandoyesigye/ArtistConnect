<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Artist extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'email',
        'stage_name',
        'gender',
        'nationality',
        'address',
        'NIN_number',
        'NIN_front_image',
        'NIN_back_image',
        'bio',
        'profile_photo',
        'social_media_link',
        'music_links',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function likes()
    {
        return $this->hasMany(ArtistLike::class);
    }

    public function followers()
    {
        return $this->hasMany(ArtistFollower::class);
    }

    public function bookings()
    {
        return $this->hasMany(ArtistBooking::class);
    }

    public function upcomingEvents()
    {
        return $this->bookings()
            ->where('date', '>=', now())
            ->where('status', 'confirmed')
            ->orderBy('date');
    }

    public function music()
    {
        return $this->hasMany(ArtistMusic::class);
    }
} 