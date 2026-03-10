<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class PortfolioComment extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'name',
        'email',
        'role',
        'comment',
        'rating',
        'avatar',
        'source',
        'featured',
        'status',
        'ip_address',
        'user_agent',
        'approved_at',
    ];

    protected $casts = [
        'rating' => 'integer',
        'featured' => 'boolean',
        'approved_at' => 'datetime',
    ];
}
