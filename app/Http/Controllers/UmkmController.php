<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Umkm;
use Illuminate\Http\Request;

class UmkmController extends Controller
{
    public function index(Request $request)
    {
        $query = Umkm::published()->with('category');

        if ($request->filled('search')) {
            $query->where('name', 'like', '%' . $request->search . '%');
        }

        if ($request->filled('category')) {
            $query->where('category_id', $request->category);
        }

        $umkms = $query->latest()->paginate(12)->withQueryString();
        $categories = Category::where('type', 'umkm')->orderBy('name')->get();

        return view('umkm.index', compact('umkms', 'categories'));
    }

    public function show(string $slug)
    {
        $umkm = Umkm::published()
            ->with('category')
            ->where('slug', $slug)
            ->firstOrFail();

        $related = Umkm::published()
            ->where('category_id', $umkm->category_id)
            ->where('id', '!=', $umkm->id)
            ->take(3)
            ->get();

        return view('umkm.show', compact('umkm', 'related'));
    }
}
