<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class AboutPage extends Model
{
    use HasFactory;

    protected $fillable = [
        'description',
        'creator_name',
        'creator_nim',
        'creator_class',
        'creator_photo',
        'features_list',
    ];

    protected $casts = [
        'features_list' => 'array',
    ];

    // Accessor for creator photo URL
    public function getCreatorPhotoUrlAttribute()
    {
        if ($this->creator_photo) {
            return asset('storage/profile/' . $this->creator_photo);
        }
        return asset('storage/profile/default.jpg');
    }
}