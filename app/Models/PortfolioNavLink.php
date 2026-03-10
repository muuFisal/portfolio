<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;

class PortfolioNavLink extends Model
{
    use HasTranslations;

    protected $fillable = [
        'label',
        'href',
        'page_key',
        'target',
        'icon',
        'is_active',
        'sort_order',
    ];

    public $translatable = [
        'label',
    ];

    protected $casts = [
        'is_active' => 'boolean',
        'sort_order' => 'integer',
    ];
}
