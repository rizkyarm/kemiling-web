<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Menampilkan halaman utama dengan data produk.
     */
    public function index()
    {
        $recommendations = Product::with('category')
                                  ->inRandomOrder()
                                  ->take(4)
                                  ->get();

        $attractions = Product::with('category')
                              ->whereHas('category', function ($query) {
                                  $query->where('slug', 'like', '%wisata%');
                              })
                              ->latest()
                              ->take(4)
                              ->get();
        
        $allProducts = Product::with('category')
                               ->latest()
                               ->get();

        return view('pages.home', compact('recommendations', 'attractions', 'allProducts'));
    }
}

