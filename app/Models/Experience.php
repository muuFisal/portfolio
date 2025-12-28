<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;

class Experience extends Model
{
    use HasTranslations;

    protected $fillable = [
        'role',
        'company',
        'start_date',
        'end_date',
        'highlights',
        'sort_order',
    ];

    public $translatable = [
        'role',
    ];

    protected $casts = [
        'start_date' => 'date',
        'end_date'   => 'date',
        'highlights' => 'array',
        'sort_order' => 'integer',
    ];
}
