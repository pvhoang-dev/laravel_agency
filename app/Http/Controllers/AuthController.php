<?php

namespace App\Http\Controllers;

use App\Enums\UserRoleEnum;
use App\Http\Requests\Auth\RegisteringRequest;
use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Laravel\Socialite\Facades\Socialite;

class AuthController extends Controller
{
    public function login()
    {

        return view('auth.login');
    }

    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();

        return redirect()->route('login');
    }


    public function callback($provider): RedirectResponse
    {
        $data = Socialite::driver($provider)->user();

        $user       = User::query()
            ->where('email', $data->getEmail())
            ->first();
        $checkExist = true;

        if (is_null($user)) {
            $user        = new User();
            $user->email = $data->getEmail();
            $checkExist  = false;
        }

        $user->name   = $data->getName();
        $user->avatar = $data->getAvatar();
        $user->role   = UserRoleEnum::ADMIN;
        $user->save();

        $role = getRoleByKey($user->role);
        Auth::login($user, true);

        if ($checkExist) {
            return redirect()->route("$role.welcome");
        }

        return redirect()->route('register');
    }

    //    public function registering(RegisteringRequest $request)
    //    {
    //        $password = Hash::make($request->password);
    //
    //        $role = $request->role;
    //
    //        if (auth()->check()) {
    //            User::where('id', auth()->user()->id)
    //                ->update([
    //                    'password' => $password,
    //                ]);
    //        } else {
    //            $user = User::create([
    //                'name' => $request->name,
    //                'email' => $request->email,
    //                'password' => $password,
    //            ]);
    //
    //            Auth::login($user);
    //        }
    //    }
    //    public function register()
    //    {
    //        return view('auth.register');
    //    }
}
