<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CvSection extends Model
{
    protected $fillable = [
        'key',
        'title',
        'content',
        'sort_order',
        'gradient_from',
        'gradient_via',
        'gradient_to',
    ];

    protected function casts(): array
    {
        return [
            'content' => 'array',
        ];
    }
}
