<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;

class PortfolioProfile extends Model
{
    use HasTranslations;

    protected $fillable = [
        'full_name',
        'headline',
        'short_bio',
        'long_bio',
        'location',
        'email',
        'phone',
        'availability_text',
        'years_experience',
        'projects_delivered',
        'clients_count',
        'focus_areas',
        'hero_badges',
        'primary_cta_label',
        'primary_cta_url',
        'secondary_cta_label',
        'secondary_cta_url',
        'resume',
        'profile_image',
        'is_active',
    ];

    public $translatable = [
        'headline',
        'short_bio',
        'long_bio',
        'location',
        'availability_text',
        'primary_cta_label',
        'secondary_cta_label',
    ];

    protected $casts = [
        'focus_areas' => 'array',
        'hero_badges' => 'array',
        'years_experience' => 'integer',
        'projects_delivered' => 'integer',
        'clients_count' => 'integer',
        'is_active' => 'boolean',
    ];
}
