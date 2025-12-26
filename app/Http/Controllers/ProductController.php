<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Category;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

        $categories = Category::withCount('products')->orderBy('name')->get();
        $products = Product::with('category')->latest()->paginate(16);

        $stats = [
            'umkm' => Product::whereHas('category', fn($q) => $q->where('slug', 'produk-umkm'))->count(),
            'wisata' => Product::whereHas('category', fn($q) => $q->where('slug', 'wisata-alam'))->count(),
            'kuliner' => Product::whereHas('category', fn($q) => $q->where('slug', 'kuliner'))->count(),
            'kerajinan' => Product::whereHas('category', fn($q) => $q->where('slug', 'kerajinan-tangan'))->count(),
        ];

        return view('pages.product', compact('products', 'categories', 'stats'));
    }
}