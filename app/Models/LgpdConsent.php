<?php

namespace App\Models;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class LgpdConsent extends Model
{
    protected $fillable = ['user_id', 'purpose', 'granted', 'granted_at'];

    protected function casts(): array
    {
        return ['granted' => 'boolean', 'granted_at' => 'datetime'];
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
