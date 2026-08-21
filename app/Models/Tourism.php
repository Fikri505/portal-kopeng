<?php

namespace App\Models;

use Database\Factories\TourismFactory;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Tourism extends Model
{
    /** @use HasFactory<TourismFactory> */
    use HasFactory;

    protected $fillable = [
        'name',
        'slug',
        'description',
        'address',
        'latitude',
        'longitude',
        'phone',
        'instagram',
        'opening_hours',
        'ticket_price',
        'facilities',
        'image',
        'is_published',
    ];

    protected function casts(): array
    {
        return [
            'latitude' => 'decimal:7',
            'longitude' => 'decimal:7',
            'is_published' => 'boolean',
        ];
    }

    /**
     * Get the categories this tourism destination belongs to.
     */
    public function categories(): BelongsToMany
    {
        return $this->belongsToMany(Category::class, 'category_tourism');
    }

    /**
     * Backward-compatible accessor for primary category.
     */
    public function getCategoryAttribute(): ?Category
    {
        return $this->categories->first();
    }

    /**
     * Scope: only published records.
     */
    public function scopePublished($query)
    {
        return $query->where('is_published', true);
    }

    /**
     * Get Google Maps navigation URL.
     */
    public function getGoogleMapsUrlAttribute(): string
    {
        return "https://www.google.com/maps/dir/?api=1&destination={$this->latitude},{$this->longitude}";
    }

    /**
     * Get publicly accessible image URL.
     */
    public function getImageUrlAttribute(): ?string
    {
        if (!$this->image) {
            return null;
        }

        if (str_starts_with($this->image, 'http://') || str_starts_with($this->image, 'https://')) {
            return $this->image;
        }

        return asset('storage/' . ltrim($this->image, '/'));
    }
}
