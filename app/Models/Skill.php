<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;

class Skill extends Model
{
    use HasTranslations;

    protected $fillable = [
        'title',
        'subtitle',
        'category',
        'level_label',
        'icon',
        'percent',
        'featured',
        'sort_order',
    ];

    public $translatable = [
        'title',
        'subtitle',
        'category',
        'level_label',
    ];

    protected $casts = [
        'title' => 'array',
        'subtitle' => 'array',
        'category' => 'array',
        'level_label' => 'array',
        'percent' => 'integer',
        'featured' => 'boolean',
        'sort_order' => 'integer',
    ];
}
