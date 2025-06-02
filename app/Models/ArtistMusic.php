<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class ArtistMusic extends Model
{
    use HasFactory;

    protected $fillable = [
        'artist_id',
        'title',
        'genre',
        'description',
        'file_path',
        'cover_image',
        'is_public',
    ];

    protected $casts = [
        'is_public' => 'boolean',
    ];

    public function artist()
    {
        return $this->belongsTo(Artist::class);
    }
}
