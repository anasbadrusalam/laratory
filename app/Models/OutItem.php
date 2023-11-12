<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class OutItem extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    /**
     * Get the user that owns the phone.
     */
    public function item(): BelongsTo
    {
        return $this->belongsTo(Item::class);
    }
}
