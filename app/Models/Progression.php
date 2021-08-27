<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Progression extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    public function road(): BelongsTo
    {
        return $this->belongsTo(Road::class);
    }

    public function images()
    {
        return $this->morphMany(Image::class, 'imageable');
    }
}
