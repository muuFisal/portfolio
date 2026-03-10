<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;

class Testimonial extends Model
{
    use HasTranslations;

    protected $fillable = [
        'name',
        'role',
        'company',
        'badge',
        'quote',
        'avatar',
        'featured',
        'sort_order',
    ];

    public $translatable = [
        'role',
        'badge',
        'quote',
    ];

    protected $casts = [
        'role' => 'array',
        'badge' => 'array',
        'quote' => 'array',
        'featured' => 'boolean',
        'sort_order' => 'integer',
    ];
}
