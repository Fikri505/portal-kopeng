<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class AddTourismCategoriesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $categories = [
            'Kuliner & View',
            'Perdagangan / Wisata Blanja',
            'Penginapan',
            'Rekreasi',
        ];

        foreach ($categories as $name) {
            Category::firstOrCreate(
                [
                    'name' => $name,
                    'type' => 'wisata',
                ],
                [
                    'slug' => Str::slug($name),
                ]
            );
        }
    }
}
