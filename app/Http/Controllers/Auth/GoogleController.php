<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Exception;
use Illuminate\Http\Request;
use Laravel\Socialite\Facades\Socialite;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class GoogleController extends Controller
{
    public function redirectToGoogle()
    {
        return Socialite::driver('google')->redirect();
    }


    public function handleGoogleCallback()
    {
        try {

            $user = Socialite::driver('google')->user();

            $finduser = User::where('google_id', $user->id)->first();

            if ($finduser) {

                Auth::login($finduser);

                return redirect()->intended('/');
            } else {
                $newUser = User::create([
                    'name' => $user->name,
                    'email' => $user->email,
                    'google_id' => $user->id,
                    'password' => encrypt('default123')
                ]);
                $newUser->assignRole('User');

                Auth::login($newUser);

                // return redirect()->route('google.update-password');
                return redirect()->route('home');
            }
        } catch (Exception $e) {
            return redirect()->route('login')->with('error', 'Akun anda login tidak menggunakan gmail');
        }
    }


    public function update_password_google()
    {
        return view('auth.passwords.update-password');
    }




    public function update_data_password_google(Request $request)
    {
        $request->validate([
            'password' => 'required|confirmed|min:8',
        ]);

        User::whereId(auth()->user()->id)->update([
            'password' => Hash::make($request->password)
        ]);

        // toast('Password Berhasil Diubah', 'success');
        return redirect()->route('landing.index');
    }
}
