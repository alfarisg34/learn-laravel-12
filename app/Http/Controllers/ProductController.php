<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Carbon\Carbon;

use Illuminate\Support\Facades\Http;
class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $products = Product::all(); // Atau gunakan pagination jika perlu
        // foreach ($products as $product) {
        //     $product->village_name = $this->getVillageName($product->location_id);
        // }
        return view('product', compact('products'));
        // return view('product');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */

    public function store(Request $request)
    {
        $data = $request->validate([
            'title' => 'required|string|max:255',
            'picture' => 'required|image|mimes:jpg,jpeg,png|max:2048',
            'desc' => 'required|string',
            'rating' => 'nullable|numeric|between:0,5',
            'category_id' => 'required|exists:categories,id',

            // Lokasi
            'province' => 'required|string',
            'regency' => 'required|string',
            'district' => 'required|string',
            'village' => 'required|string', // <- Ini yang disimpan
            'deactivate_at' => 'nullable|numeric',
        ]);

        $data['last_edited_by'] = auth()->id();
        $data['rating'] = 5;

        $data['deactivate_at'] = $request->filled('deactivate_at')
            ? Carbon::now()->addMonths((int) $request->input('deactivate_at'))
            : Carbon::now()->addYear();

        // Handle file upload
        if ($request->hasFile('picture')) {
            $data['picture'] = $request->file('picture')->store('posts', 'public');
        }

        // Simpan kode kelurahan ke field `location_id` (atau apa pun nama kolomnya di DB)
        $data['location_id'] = $data['village'];

        // Ambil nama kelurahan dari API
        try {
            $districtCode = substr($data['village'], 0, 8);
            $response = Http::withOptions(['verify' => false])
                ->get("https://wilayah.id/api/villages/{$districtCode}.json");

            if ($response->successful()) {
                $villages = $response->json()['data'];
                $matched = collect($villages)->firstWhere('code', $data['village']);
                $data['location_name'] = $matched['name'] ?? null;
            } else {
                $data['location_name'] = null;
            }
        } catch (\Exception $e) {
            $data['location_name'] = null;
        }

        // Hapus input yang tidak dibutuhkan di tabel
        unset($data['province'], $data['regency'], $data['district'], $data['village']);

        Product::create($data);

        return redirect()->route('createProduct')->with('success', 'Product created successfully!');
    }


    /**
     * Display the specified resource.
     */
    public function show(Product $product)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Product $product)
    {
        $locationCode = $product->location_id;

        $selectedProvince = substr($locationCode, 0, 2);
        $selectedRegency = substr($locationCode, 0, 5);
        $selectedDistrict = substr($locationCode, 0, 8);
        $selectedVillage = $locationCode;

        return view('updateProduct', compact(
            'product',
            'selectedProvince',
            'selectedRegency',
            'selectedDistrict',
            'selectedVillage'
        ));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Product $product)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'desc' => 'required|string',
            'picture' => 'nullable|image',
            'category_id' => 'nullable|exists:categories,id',
            'status' => 'boolean|nullable',

            // Lokasi
            'province' => 'required|string',
            'regency' => 'required|string',
            'district' => 'required|string',
            'village' => 'required|string',
        ]);

        // Handle image upload
        if ($request->hasFile('picture')) {
            $validated['picture'] = $request->file('picture')->store('product', 'public');
        }

        // Handle deactivate_at dan status
        if ($request->filled('deactivate_at')) {
            $validated['deactivate_at'] = Carbon::now()->addMonths((int) $request->input('deactivate_at'));
            $validated['status'] = '1';
        }

        // Simpan kode kelurahan ke field location_id
        $validated['location_id'] = $validated['village'];

        // Ambil nama kelurahan dari API
        try {
            $districtCode = substr($validated['village'], 0, 8);
            $response = Http::withOptions(['verify' => false])
                ->get("https://wilayah.id/api/villages/{$districtCode}.json");

            if ($response->successful()) {
                $villages = $response->json()['data'];
                $matched = collect($villages)->firstWhere('code', $validated['village']);
                $validated['location_name'] = $matched['name'] ?? null;
            } else {
                $validated['location_name'] = null;
            }
        } catch (\Exception $e) {
            $validated['location_name'] = null;
        }

        // Hapus field bantu dari array
        unset($validated['province'], $validated['regency'], $validated['district'], $validated['village']);

        // Update ke DB
        $product->update($validated);

        return redirect()->route('admin.product.index')
            ->with('success', 'Product updated successfully.');
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Product $product)
    {
        $product->delete();

        return redirect()->route('admin.product.index')
            ->with('success', 'Product deleted successfully.');
    }

    private function getVillageName($villageCode)
    {
        $districtCode = substr($villageCode, 0, 8); // Contoh: "12.34.56" dari "12.34.56.7890"
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
