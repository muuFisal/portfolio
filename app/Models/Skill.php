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
        'percent',
        'sort_order',
    ];

    public $translatable = ['title', 'subtitle'];

    protected $casts = [
        'title' => 'array',
        'subtitle' => 'array',
        'percent' => 'integer',
        'sort_order' => 'integer',
    ];
}
