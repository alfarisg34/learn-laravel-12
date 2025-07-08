<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\Product;
use App\Models\Category;

use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    public function index()
    {
        // Total counts
        $totalPosts = Post::count();
        $totalProducts = Product::count();

        // Products grouped by category
        $productsByCategory = DB::table('products')
            ->join('categories', 'products.category_id', '=', 'categories.id')
            ->select('categories.name as category_name', DB::raw('COUNT(*) as total'))
            ->groupBy('categories.name')
            ->orderBy('total', 'desc') // sort from biggest to smallest
            ->get();

        // Products grouped by location (assuming "province" field exists on products)
        $productsByLocation = Product::selectRaw('location_name, COUNT(*) as total')
            ->groupBy('location_name')
            ->orderBy('total', 'desc') // sort from biggest to smallest
            ->get();

        return view('dashboard', [
            'totalPosts' => $totalPosts,
            'totalProducts' => $totalProducts,
            'productsByCategory' => $productsByCategory,
            'productsByLocation' => $productsByLocation,
        ]);
    }
}
