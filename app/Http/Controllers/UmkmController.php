<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class UmkmController extends Controller
{
    public function index(Request $request)
    {
        $query = Product::query();

        // Filter by category
        if ($request->filled('category')) {
            $query->where('category_id', $request->category);
        }

        // Filter by location (partial match)
        if ($request->filled('location')) {
            $query->where('location_name', 'like', '%' . $request->location . '%');
        }

        $products = $query->latest()->get();

        // Ambil nama kelurahan dari location_id
        foreach ($products as $product) {
            $product->village_name = $this->getVillageName($product->location_id);
        }

        $categories = Category::all();

        return view('umkm', compact('products', 'categories'));
    }

    private function getVillageName($villageCode)
    {
        if (!$villageCode)
            return null;

        $districtCode = substr($villageCode, 0, 8);
        $response = Http::withOptions(['verify' => false])
            ->get("https://wilayah.id/api/villages/{$districtCode}.json");

        if ($response->successful()) {
            $villages = $response->json()['data'];
            $village = collect($villages)->firstWhere('code', $villageCode);
            return $village['name'] ?? null;
        }

        return null;
    }
}
