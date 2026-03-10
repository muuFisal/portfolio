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
        'description',
        'category',
        'featured',
        'is_open_source',
        'tags',
        'stack',
        'highlights',
        'challenges',
        'solutions',
        'metrics',
        'cover_image',
        'og_image',
        'web_url',
        'google_play_url',
        'app_store_url',
        'repository_url',
        'case_study_url',
        'client_name',
        'project_date',
        'seo_title',
        'seo_description',
        'seo_keywords',
        'sort_order',
    ];

    public $translatable = [
        'title',
        'summary',
        'description',
        'seo_title',
        'seo_description',
    ];

    protected $casts = [
        'featured' => 'boolean',
        'is_open_source' => 'boolean',
        'tags' => 'array',
        'stack' => 'array',
        'highlights' => 'array',
        'challenges' => 'array',
        'solutions' => 'array',
        'metrics' => 'array',
        'seo_keywords' => 'array',
        'project_date' => 'date',
        'sort_order' => 'integer',
    ];

    public function images(): HasMany
    {
        return $this->hasMany(ProjectImage::class)->orderBy('sort_order');
    }
}
