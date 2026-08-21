<?php

namespace App\Http\Controllers;

use App\Models\Tourism;
use App\Models\Umkm;

class MapController extends Controller
{
    public function index()
    {
        return view('peta');
    }

    /**
     * API endpoint to return map markers as JSON.
     */
    public function locations()
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
                'image' => $item->image_url,
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
                'image' => $item->image_url,
                'url' => route('wisata.show', $item->slug),
                'google_maps_url' => $item->google_maps_url,
            ]);

        return response()->json($umkm->merge($tourism)->values());
    }
}
