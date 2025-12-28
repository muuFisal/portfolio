<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Spatie\Translatable\HasTranslations;

class Project extends Model
{
    use HasTranslations;

    protected $fillable = [
        'slug',
        'title',
        'summary',
        'featured',
        'tags',
        'cover_image',
        'web_url',
        'google_play_url',
        'app_store_url',
    ];

    public $translatable = [
        'title',
        'summary',
    ];

    protected $casts = [
        'featured' => 'boolean',
        'tags'     => 'array',
    ];

    public function images(): HasMany
    {
        return $this->hasMany(ProjectImage::class)->orderBy('sort_order');
    }
}
