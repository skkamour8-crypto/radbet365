<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Wallet extends Model
{
    protected $fillable = ['user_id', 'points'];
    protected function casts(): array { return ['points' => 'integer']; }
    public function user(): BelongsTo { return $this->belongsTo(User::class); }
}
