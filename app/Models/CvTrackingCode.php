<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CvTrackingCode extends Model
{
    protected $fillable = [
        'code',
        'entity',
        'expires_at',
        'hit_count',
        'last_hit_at',
    ];

    protected function casts(): array
    {
        return [
            'expires_at' => 'datetime',
            'last_hit_at' => 'datetime',
        ];
    }

    public function isExpired(): bool
    {
        return $this->expires_at->isPast();
    }
}
