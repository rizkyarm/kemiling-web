<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use Laravel\Socialite\Facades\Socialite;
use Illuminate\Auth\Events\Verified;

class GoogleAuthController extends Controller
{
    public function redirect()
    {
        return Socialite::driver('google')->redirect();
    }

    public function callback()
    {
        $gUser = Socialite::driver('google')->user();

        $user = User::where('google_id', $gUser->getId())
            ->orWhere('email', $gUser->getEmail())
            ->first();

        if (!$user) {
            $username = $this->makeUniqueUsername($gUser->getEmail() ?: $gUser->getName());

            $user = User::create([
                'name'     => $gUser->getName() ?: 'User',
                'username' => $username,
                'email'    => $gUser->getEmail(),
                'google_id'=> $gUser->getId(),
                'password' => bcrypt(Str::random(32)),
                'profile_photo_path' => null,
            ]);
        } else {
            if (empty($user->google_id)) {
                $user->google_id = $gUser->getId();
            }
        }

        if (! $user->hasVerifiedEmail()) {
            $user->markEmailAsVerified(); 
            event(new Verified($user));   
        }
        $user->save(); 
        // =====================================================

        Auth::guard('web')->login($user, remember: true);

        return redirect()->intended(route('home'));
    }

    private function makeUniqueUsername(string $nameOrEmail): string
    {
        $base = str_contains($nameOrEmail, '@') ? strstr($nameOrEmail, '@', true) : $nameOrEmail;
        $base = Str::slug($base, '_') ?: 'user';
        $username = $base; $i = 1;
        while (User::where('username', $username)->exists()) {
            $username = $base . '_' . ($i++);
        }
        return $username;
    }
}
