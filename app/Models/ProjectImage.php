<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Spatie\Translatable\HasTranslations;

class ProjectImage extends Model
{
    use HasTranslations;

    protected $fillable = [
        'project_id',
        'image',
        'alt_text',
        'sort_order',
    ];

    public $translatable = [
        'alt_text',
    ];

    protected $casts = [
        'alt_text' => 'array',
        'sort_order' => 'integer',
    ];

    public function project(): BelongsTo
    {
        return $this->belongsTo(Project::class);
    }
}
