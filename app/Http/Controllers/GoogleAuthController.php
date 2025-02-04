<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Laravel\Socialite\Facades\Socialite;

class GoogleAuthController extends Controller
{
    /**
     * Redirect to Google Authentication Page
     */
    public function redirect()
    {
        return Socialite::driver('google')->redirect();
    }

    /**
     * Handle Google OAuth Callback
     */
    public function callbackGoogle()
    {
        try {
            $google_user = Socialite::driver('google')->stateless()->user();


            $user = User::where('google_id', $google_user->getId())->orWhere('email', $google_user->getEmail())->first();

            $isNewUser = false;

            if (!$user) {

                $user = User::create([
                    'name' => $google_user->getName(),
                    'email' => $google_user->getEmail(),
                    'password' => bcrypt(uniqid()),
                    'profile_pic' => 'images/default-pp.jpg',

                ]);
                $user->google_id = $google_user->getId();
                $user->save();

                $isNewUser = true;
            } else {
                if (!$user->google_id) {
                    $user->update(['google_id' => $google_user->getId()]);
                }
            }

            // Log the user in
            Auth::login($user);

            if ($isNewUser) {
            return redirect()->route('create.form', ['id' => $user->id]);
            } else {
                return redirect()->route('socmed.form', ['id' => $user->id]);
            }

        } catch (\Throwable $th) {
            return redirect()->route('register.form')->with('error', 'Google login failed: ' . $th->getMessage());
        }
    }
}
