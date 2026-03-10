<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;

class PortfolioSection extends Model
{
    use HasTranslations;

    protected $fillable = [
        'key',
        'title',
        'subtitle',
        'content',
        'items',
        'image',
        'is_active',
        'sort_order',
    ];

    public $translatable = [
        'title',
        'subtitle',
    ];

    protected $casts = [
        'content' => 'array',
        'items' => 'array',
        'is_active' => 'boolean',
        'sort_order' => 'integer',
    ];
}
