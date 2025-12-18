<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class WebsiteSetting extends Model
{
    use HasFactory;

    protected $fillable = [
        'site_name',
        'logo',
        'favicon',
        'primary_color',
        'bg_color',
        'accent_color',
        'alert_color',
        'footer_text',
        'email',
        'phone',
        'address',
        'social_media',
    ];

    protected $casts = [
        'social_media' => 'array',
    ];

    // Accessor for logo URL
    public function getLogoUrlAttribute()
    {
        if ($this->logo) {
            return asset('storage/logos/' . $this->logo);
        }
        return asset('storage/logos/logo.png');
    }

    // Singleton pattern for settings
    public static function getSettings()
    {
        $settings = self::first();
        if (!$settings) {
            $settings = self::create([
                'site_name' => 'Hop & Go Cars',
                'footer_text' => '© 2024 Hop & Go Cars. All rights reserved.',
                'email' => 'contact@hopgocars.com',
                'phone' => '+62 812 3456 7890',
                'address' => 'Jl. Contoh No. 123, Jakarta',
            ]);
        }
        return $settings;
    }
}