<?php

namespace App\Http\Controllers; 

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use App\Http\Controllers\Controller; 

class DaftarController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('pages.daftar');
    
    }

    public function create() {
        return view('pages.daftar');
    }

    

    public function store(Request $request)
        {
            $request->validate([
                'name' => ['required', 'string', 'max:255'],
                'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
                'phone' => ['required', 'string', 'min:10', 'max:15'],
                'password' => ['required', 'string', 'min:8', 'confirmed'],
                'profile_photo' => ['nullable', 'image', 'mimes:jpg,jpeg,png', 'max:2048'], // Validasi untuk foto
            ]);

            $photoPath = null;
            if ($request->hasFile('profile_photo')) {
                // Simpan foto ke public storage dan dapatkan path-nya
                $photoPath = $request->file('profile_photo')->store('profile-photos', 'public');
            }

            $user = User::create([
                'name' => $request->name,
                'email' => $request->email,
                'phone' => $request->phone,
                'password' => Hash::make($request->password),
                'profile_photo_path' => $photoPath, // Simpan path foto
            ]);

            Auth::login($user);

            return redirect('/home');
        }
}