<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProfileUpdateRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;
use Illuminate\Support\Facades\Storage;

use Intervention\Image\ImageManager;
use Intervention\Image\Drivers\Gd\Driver;

class ProfileController extends Controller
{
    /**
     * Display the user's profile form.
     */
    public function edit(Request $request): View
    {
        return view('profile.edit', [
            'user' => $request->user(),
        ]);
    }

    /**
     * Update the user's profile information.
     */
    public function update(ProfileUpdateRequest $request): RedirectResponse
    {
        $user = $request->user();
        
        $user->fill($request->validated());

        if ($user->isDirty('email')) {
            $user->email_verified_at = null;
        }

        if ($request->hasFile('profile_photo')) {
            $request->validate([
                'profile_photo' => ['image', 'mimes:jpg,jpeg,png,webp', 'max:4096'] 
            ]);

            if ($user->profile_photo_path) {
                Storage::disk('public')->delete($user->profile_photo_path);
                
                $oldFileName = basename($user->profile_photo_path);
                $oldThumbPath = 'profile-photos/thumb/' . $oldFileName;
                Storage::disk('public')->delete($oldThumbPath);
            }
            
            $imageManager = new ImageManager(new Driver());
            $image = $imageManager->read($request->file('profile_photo'));

            $fileName = uniqid() . '.jpg';
            $originalPath = 'profile-photos/' . $fileName;
            $thumbPath = 'profile-photos/thumb/' . $fileName;

            $originalImageStream = $image->toJpeg(85)->toString();
            Storage::disk('public')->put($originalPath, $originalImageStream);

            $thumbnailImageStream = $image->cover(80, 80)->toJpeg(75)->toString();
            Storage::disk('public')->put($thumbPath, $thumbnailImageStream);

            $user->profile_photo_path = $originalPath;
            
        }

        $user->save();

        return Redirect::route('profile.edit')->with('status', 'Profil berhasil diperbarui.');
    }

    /**
     * Delete the user's account.
     */
    public function destroy(Request $request): RedirectResponse
    {
        $request->validateWithBag('userDeletion', [
            'password' => ['required', 'current_password'],
        ]);

        $user = $request->user();

        if ($user->profile_photo_path) {
            Storage::disk('public')->delete($user->profile_photo_path);

            $fileName = basename($user->profile_photo_path);
            $thumbPath = 'profile-photos/thumb/' . $fileName;
            Storage::disk('public')->delete($thumbPath);
        }

        Auth::logout();

        $user->delete();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return Redirect::to('/');
    }
}

