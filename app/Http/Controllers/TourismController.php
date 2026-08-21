<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Tourism;
use Illuminate\Http\Request;

class TourismController extends Controller
{
    public function index(Request $request)
    {
        $query = Tourism::published()->with('categories');

        if ($request->filled('search')) {
            $query->where('name', 'like', '%' . $request->search . '%');
        }

        if ($request->filled('category')) {
            $query->whereHas('categories', function ($q) use ($request) {
                $q->where('categories.id', $request->category);
            });
        }

        $tourisms = $query->latest()->paginate(12)->withQueryString();
        $categories = Category::where('type', 'wisata')->orderBy('name')->get();

        return view('wisata.index', compact('tourisms', 'categories'));
    }

    public function show(string $slug)
    {
        $tourism = Tourism::published()
            ->with('categories')
            ->where('slug', $slug)
            ->firstOrFail();

        $categoryIds = $tourism->categories->pluck('id');

        $related = Tourism::published()
            ->with('categories')
            ->whereHas('categories', function ($q) use ($categoryIds) {
                $q->whereIn('categories.id', $categoryIds);
            })
            ->where('id', '!=', $tourism->id)
            ->take(3)
            ->get();

        return view('wisata.show', compact('tourism', 'related'));
    }
}
