<?php

namespace App\Http\Controllers;

use App\Models\Page;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Password;
use Illuminate\Support\Str;

class AuthController extends Controller
{
    public function register(Request $request): RedirectResponse
    {
        $request->validate([
            'name' => 'required',
            'year' => 'required',
            'email' => 'required|email|unique:user,email',
            'password' => 'required|confirmed|min:8',
        ]);
        if (!strpos($request->get('email'), 'unimail.winchester.ac.uk')){
            return redirect()->back()->withErrors(['email' => 'This is not a university email address']);
        }
        $user = new User([
            'name' => $request->get('name'),
            'email' => $request->get('email'),
            'password' => Hash::make($request->get('password')),
            'year' => $request->get('year')
        ]);
        $user->save();

        $page = new Page([
            'user_id' => $user->id,
        ]);
        $page->save();

        $this->authorize_credentials($request);
        return redirect('/my-page');
    }

    public function login(Request $request): RedirectResponse
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required'
        ]);
        try {
            if($this->authorize_credentials($request)){
                return redirect('/');
            }
            return redirect()->back()->withErrors(['email' => 'These credentials are incorrect or do not exist in our records']);
        }
        catch(\Exception $e){
            return redirect()->back()->withErrors(['email' => 'These credentials are incorrect or do not exist in our records']);
        }

    }

    public function forgot(Request $request): RedirectResponse
    {
        $request->validate([
           'email' => 'required|email',
        ]);

        Password::sendResetLink(
            $request->only('email')
        );

        return redirect()->to('/login');
    }

    public function reset(Request $request): RedirectResponse
    {
        $request->validate([
            'token' => 'required',
            'email' => 'required|email',
            'password' => 'required|min:8|confirmed',
        ]);

        $status = Password::reset(
            $request->only('email', 'password', 'password_confirmation', 'token'),
            function ($user, $password) use ($request) {
                $user->forceFill([
                    'password' => Hash::make($password)
                ])->setRememberToken(Str::random(60));

                $user->save();
            }
        );

        return $status == Password::PASSWORD_RESET
            ? redirect()->route('page.login')->with('status', __($status))
            : back()->withErrors(['email' => [__($status)]]);
    }


    public function authorize_credentials(Request $request)
    {
        $credentials = $request->only(['email', 'password']);
        return Auth::attempt($credentials, $request->get('remember'));
    }

    public function logout(Request $request): RedirectResponse
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/');
    }

}
