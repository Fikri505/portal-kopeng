<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Umkm;
use Illuminate\Http\Request;

class UmkmController extends Controller
{
    public function index(Request $request)
    {
        $query = Umkm::published()->with('categories');

        if ($request->filled('search')) {
            $query->where('name', 'like', '%' . $request->search . '%');
        }

        if ($request->filled('category')) {
            $query->whereHas('categories', function ($q) use ($request) {
                $q->where('categories.id', $request->category);
            });
        }

        $umkms = $query->latest()->paginate(12)->withQueryString();
        $categories = Category::where('type', 'umkm')->orderBy('name')->get();

        return view('umkm.index', compact('umkms', 'categories'));
    }

    public function show(string $slug)
    {
        $umkm = Umkm::published()
            ->with('categories')
            ->where('slug', $slug)
            ->firstOrFail();

        $categoryIds = $umkm->categories->pluck('id');

        $related = Umkm::published()
            ->with('categories')
            ->whereHas('categories', function ($q) use ($categoryIds) {
                $q->whereIn('categories.id', $categoryIds);
            })
            ->where('id', '!=', $umkm->id)
            ->take(3)
            ->get();

        return view('umkm.show', compact('umkm', 'related'));
    }
}
