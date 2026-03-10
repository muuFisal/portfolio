<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;

class PortfolioPage extends Model
{
    use HasTranslations;

    protected $fillable = [
        'page_key',
        'title',
        'seo_title',
        'seo_description',
        'seo_keywords',
        'og_image',
        'canonical_url',
        'robots',
        'extra_meta',
    ];

    public $translatable = [
        'title',
        'seo_title',
        'seo_description',
    ];

    protected $casts = [
        'seo_keywords' => 'array',
        'extra_meta' => 'array',
    ];
}
