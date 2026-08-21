<?php

namespace Tests\Feature;

use App\Models\Category;
use App\Models\Tourism;
use App\Models\Umkm;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class MultiCategoryTest extends TestCase
{
    use RefreshDatabase;

    public function test_tourism_can_have_multiple_categories(): void
    {
        $cat1 = Category::create(['name' => 'Kuliner & View', 'slug' => 'kuliner-view', 'type' => 'wisata']);
        $cat2 = Category::create(['name' => 'Rekreasi', 'slug' => 'rekreasi', 'type' => 'wisata']);

        $tourism = Tourism::create([
            'name' => 'The Kopeng Park',
            'slug' => 'the-kopeng-park',
            'description' => 'Taman rekreasi dan kuliner',
            'address' => 'Desa Kopeng',
            'latitude' => -7.3720,
            'longitude' => 110.4210,
            'is_published' => true,
        ]);

        $tourism->categories()->attach([$cat1->id, $cat2->id]);

        $this->assertCount(2, $tourism->fresh()->categories);
        $this->assertTrue($tourism->fresh()->categories->contains($cat1));
        $this->assertTrue($tourism->fresh()->categories->contains($cat2));

        // Test filtering
        $response1 = $this->get('/wisata?category=' . $cat1->id);
        $response1->assertStatus(200);
        $response1->assertSee('The Kopeng Park');

        $response2 = $this->get('/wisata?category=' . $cat2->id);
        $response2->assertStatus(200);
        $response2->assertSee('The Kopeng Park');

        // Test show page
        $showResponse = $this->get('/wisata/' . $tourism->slug);
        $showResponse->assertStatus(200);
        $showResponse->assertSee('Kuliner &amp; View', false);
        $showResponse->assertSee('Rekreasi');
    }

    public function test_umkm_can_have_multiple_categories(): void
    {
        $cat1 = Category::create(['name' => 'Kuliner & Makanan', 'slug' => 'kuliner-makanan', 'type' => 'umkm']);
        $cat2 = Category::create(['name' => 'Oleh-Oleh & Souvenir', 'slug' => 'oleh-oleh-souvenir', 'type' => 'umkm']);

        $umkm = Umkm::create([
            'name' => 'Keripik Jamur & Cafe Kopeng',
            'slug' => 'keripik-jamur-cafe-kopeng',
            'description' => 'Oleh-oleh dan cafe',
            'address' => 'Desa Kopeng',
            'latitude' => -7.3720,
            'longitude' => 110.4210,
            'is_published' => true,
        ]);

        $umkm->categories()->attach([$cat1->id, $cat2->id]);

        $this->assertCount(2, $umkm->fresh()->categories);

        // Test filtering
        $response = $this->get('/umkm?category=' . $cat1->id);
        $response->assertStatus(200);
        $response->assertSee('Keripik Jamur &amp; Cafe Kopeng', false);

        // Test show page
        $showResponse = $this->get('/umkm/' . $umkm->slug);
        $showResponse->assertStatus(200);
        $showResponse->assertSee('Kuliner &amp; Makanan', false);
        $showResponse->assertSee('Oleh-Oleh &amp; Souvenir', false);
    }

    public function test_map_api_returns_joined_categories(): void
    {
        $cat1 = Category::create(['name' => 'Wisata Alam', 'slug' => 'wisata-alam', 'type' => 'wisata']);
        $cat2 = Category::create(['name' => 'Rekreasi', 'slug' => 'rekreasi', 'type' => 'wisata']);

        $tourism = Tourism::create([
            'name' => 'Taman Kopeng Indah',
            'slug' => 'taman-kopeng-indah',
            'latitude' => -7.3720,
            'longitude' => 110.4210,
            'is_published' => true,
        ]);
        $tourism->categories()->attach([$cat1->id, $cat2->id]);

        $response = $this->getJson('/api/locations');
        $response->assertStatus(200);
        $response->assertJsonFragment([
            'name' => 'Taman Kopeng Indah',
            'category' => 'Wisata Alam, Rekreasi',
        ]);
    }
}
