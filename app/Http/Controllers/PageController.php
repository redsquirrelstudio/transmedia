<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Contracts\View\View;

class PageController extends Controller
{
    public function index(): View
    {
        return view('index');
    }

    public function register(): View
    {
        return view('register');
    }

    public function login(): View
    {
        return view('login');
    }

    public function exhibition(): View
    {
        return view('exhibition');
    }
}
