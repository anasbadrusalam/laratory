<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class In extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    /**
     * Get the comments for the blog post.
     */
    public function items(): HasMany
    {
        return $this->hasMany(InItem::class);
    }
}
