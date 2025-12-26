<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TentangController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('pages.tentang');
    }

    // Anda bisa membiarkan method lain (create, store, dll)
    // atau menghapusnya jika tidak digunakan.
}