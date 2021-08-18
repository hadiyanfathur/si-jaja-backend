<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class RoadDetail extends Model
{
    use HasFactory;

    public function road(): BelongsTo
    {
        return $this->belongsTo(Road::class);
    }
}
