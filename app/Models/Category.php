<?php

namespace App\Models;

use Database\Factories\CategoryFactory;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

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
    public function umkms(): BelongsToMany
    {
        return $this->belongsToMany(Umkm::class, 'category_umkm');
    }

    /**
     * Get tourism records belonging to this category.
     */
    public function tourisms(): BelongsToMany
    {
        return $this->belongsToMany(Tourism::class, 'category_tourism');
    }
}
