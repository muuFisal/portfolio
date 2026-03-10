<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;

class Event extends Model
{
    use HasTranslations;

    protected $fillable = [
        'title',
        'date',
        'type',
        'location',
        'description',
        'url',
        'cover_image',
        'featured',
        'sort_order',
    ];

    public $translatable = [
        'title',
        'location',
        'description',
    ];

    protected $casts = [
        'date' => 'date',
        'featured' => 'boolean',
        'sort_order' => 'integer',
    ];
}
