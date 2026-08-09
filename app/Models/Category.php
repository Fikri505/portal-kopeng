<?php

namespace App\Models;

use Database\Factories\CategoryFactory;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Category extends Model
{
    /** @use HasFactory<CategoryFactory> */
    use HasFactory;

    protected $fillable = [
        'name',
        'slug',
        'type',
    ];

    /**
     * Get UMKM records belonging to this category.
     */
    public function umkms(): HasMany
    {
        return $this->hasMany(Umkm::class);
    }

    /**
     * Get tourism records belonging to this category.
     */
    public function tourisms(): HasMany
    {
        return $this->hasMany(Tourism::class);
    }
}
