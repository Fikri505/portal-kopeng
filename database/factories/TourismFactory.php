<?php

namespace Database\Factories;

use App\Models\Category;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Tourism>
 */
class TourismFactory extends Factory
{
    public function definition(): array
    {
        $name = fake()->unique()->words(3, true);
        $name = ucwords($name);

        // Coordinates around Kopeng area
        $latitude = fake()->latitude(-7.40, -7.36);
        $longitude = fake()->longitude(110.40, 110.45);

        return [
            'category_id' => Category::factory(),
            'name' => $name,
            'slug' => Str::slug($name),
            'description' => fake()->paragraphs(3, true),
            'address' => 'Desa Kopeng, Kec. Getasan, Kab. Semarang, Jawa Tengah',
            'latitude' => $latitude,
            'longitude' => $longitude,
            'phone' => '08' . fake()->numerify('##########'),
            'instagram' => '@' . Str::slug($name, ''),
            'opening_hours' => fake()->randomElement([
                '06:00 - 18:00',
                '07:00 - 17:00',
                '08:00 - 16:00',
                '24 Jam',
            ]),
            'ticket_price' => fake()->randomElement([
                'Gratis',
                'Rp 5.000',
                'Rp 10.000',
                'Rp 15.000',
                'Rp 20.000',
                'Rp 25.000',
            ]),
            'facilities' => fake()->randomElement([
                'Parkir, Toilet, Mushola',
                'Parkir, Toilet, Mushola, Gazebo, Area Foto',
                'Parkir, Toilet, Warung Makan',
                'Parkir, Toilet, Mushola, Playground',
                'Parkir, Toilet, Camping Ground, Mushola',
            ]),
            'image' => null,
            'is_published' => true,
        ];
    }

    /**
     * Set the tourism destination as unpublished.
     */
    public function unpublished(): static
    {
        return $this->state(fn (array $attributes) => [
            'is_published' => false,
        ]);
    }
}
