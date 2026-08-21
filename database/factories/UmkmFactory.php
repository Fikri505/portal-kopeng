<?php

namespace Database\Factories;

use App\Models\Category;
use App\Models\Umkm;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Umkm>
 */
class UmkmFactory extends Factory
{
    public function definition(): array
    {
        $name = fake()->unique()->company();

        // Coordinates around Kopeng area (Semarang, Central Java)
        // Approx: -7.36 to -7.40 latitude, 110.40 to 110.45 longitude
        $latitude = fake()->latitude(-7.40, -7.36);
        $longitude = fake()->longitude(110.40, 110.45);

        return [
            'name' => $name,
            'slug' => Str::slug($name),
            'description' => fake()->paragraphs(2, true),
            'address' => 'Desa Kopeng, Kec. Getasan, Kab. Semarang, Jawa Tengah',
            'latitude' => $latitude,
            'longitude' => $longitude,
            'whatsapp' => '08' . fake()->numerify('##########'),
            'instagram' => '@' . Str::slug($name, ''),
            'opening_hours' => fake()->randomElement([
                '08:00 - 17:00',
                '09:00 - 21:00',
                '07:00 - 20:00',
                '10:00 - 22:00',
                '08:00 - 16:00',
            ]),
            'image' => null,
            'is_published' => true,
        ];
    }

    public function configure(): static
    {
        return $this->afterCreating(function (Umkm $umkm) {
            if ($umkm->categories()->count() === 0) {
                $category = Category::where('type', 'umkm')->inRandomOrder()->first()
                    ?? Category::factory()->create(['type' => 'umkm']);
                $umkm->categories()->attach($category);
            }
        });
    }

    /**
     * Set the UMKM as unpublished.
     */
    public function unpublished(): static
    {
        return $this->state(fn (array $attributes) => [
            'is_published' => false,
        ]);
    }
}
