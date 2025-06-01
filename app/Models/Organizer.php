<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Organizer extends Model
{
    protected $fillable = [
        'user_id',
        'organization_name',
        'organization_type',
        'phone_number',
        'address',
        'business_registration',
        'business_registration_doc',
        'bio',
        'profile_photo',
        'social_media_links',
    ];

    protected $casts = [
        'social_media_links' => 'array',
    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
