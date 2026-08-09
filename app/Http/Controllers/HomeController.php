<?php

namespace App\Http\Controllers;

use App\Models\Tourism;
use App\Models\Umkm;

class HomeController extends Controller
{
    public function index()
    {
        $featuredUmkm = Umkm::published()
            ->with('category')
            ->latest()
            ->take(6)
            ->get();

        $featuredTourism = Tourism::published()
            ->with('category')
            ->latest()
            ->take(6)
            ->get();

        $mapLocations = $this->getMapLocations();

        return view('home', compact('featuredUmkm', 'featuredTourism', 'mapLocations'));
    }

    private function getMapLocations(): array
    {
        $umkm = Umkm::published()
            ->with('category')
            ->get()
            ->map(fn ($item) => [
                'id' => $item->id,
                'name' => $item->name,
                'type' => 'umkm',
                'category' => $item->category->name ?? '-',
                'address' => $item->address,
                'latitude' => (float) $item->latitude,
                'longitude' => (float) $item->longitude,
                'image' => $item->image ? asset('storage/' . $item->image) : null,
                'url' => route('umkm.show', $item->slug),
                'google_maps_url' => $item->google_maps_url,
            ]);

        $tourism = Tourism::published()
            ->with('category')
            ->get()
            ->map(fn ($item) => [
                'id' => $item->id,
                'name' => $item->name,
                'type' => 'wisata',
                'category' => $item->category->name ?? '-',
                'address' => $item->address,
                'latitude' => (float) $item->latitude,
                'longitude' => (float) $item->longitude,
                'image' => $item->image ? asset('storage/' . $item->image) : null,
                'url' => route('wisata.show', $item->slug),
                'google_maps_url' => $item->google_maps_url,
            ]);

        return $umkm->merge($tourism)->toArray();
    }
}
