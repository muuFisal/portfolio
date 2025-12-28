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
        'location',
        'description',
        'sort_order',
    ];

    public $translatable = [
        'title',
        'location',
        'description',
    ];

    protected $casts = [
        'date' => 'date',
        'sort_order' => 'integer',
    ];
}
