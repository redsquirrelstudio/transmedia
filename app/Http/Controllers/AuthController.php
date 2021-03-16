<?php

namespace App\Http\Controllers;

use App\Models\Page;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function register(Request $request): RedirectResponse
    {
        $request->validate([
            'name' => 'required',
            'year' => 'required',
            'email' => 'required|email|unique:user,email',
            'password' => 'required|confirmed',
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
            $this->authorize_credentials($request);
            return redirect('/');
        }
        catch(\Exception $e){
            return redirect()->back()->withErrors(['email' => 'These credentials are incorrect or do not exist in our records']);
        }

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
