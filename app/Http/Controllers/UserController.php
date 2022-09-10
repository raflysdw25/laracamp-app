<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

// Models
use App\Models\User;

// Helper
use Laravel\Socialite\Facades\Socialite;
use Auth;

class UserController extends Controller
{
    public function login()
    {
        return view('auth.user.login');
    }

    public function google(){
        return Socialite::driver('google')->redirect();
    }
    public function handleProviderCallback(){
        $callback = Socialite::driver('google')->stateless()->user();

        $userData = [
            "name" => $callback->getName(),
            "email" => $callback->getEmail(),
            "avatar" => $callback->getAvatar(),
            "email_verified_at" => date('Y-m-d H:i:s', time())
        ];

        // Jika email sudah terdaftar, maka akan update data yang ada, jika tidak ketemu maka akan membuat data baru
        $user = User::firstOrCreate(["email" => $userData['email']], $userData);

        // Login user
        Auth::login($user, true);

        return redirect(route('welcome'));
    }
}
