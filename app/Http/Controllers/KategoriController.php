<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Product;

class KategoriController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $categories = Category::withCount('products')->orderBy('name')->get();

        $products = Product::with('category')->latest()->get();
        
        return view('pages.kategori', compact('categories', 'products'));
    }

    
}