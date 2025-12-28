<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;

class Testimonial extends Model
{
    use HasTranslations;

    protected $fillable = [
        'name',
        'badge',
        'quote',
        'sort_order',
    ];

    protected $casts = [
        'sort_order' => 'integer',
    ];
}
