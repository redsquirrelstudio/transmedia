@extends('layouts.app')

@section('content')
    <div class="top">
        <div class="auth-card">
            <form method="post" action="{{ route('auth.login') }}">
                @csrf
                <h2>
                    Sign In
                </h2>
                <p>
                    If you are a DMD student, sign in using your registered email address and password,
                    if you do not have an account yet, sign up <a href="{{ url('/register') }}">here.</a>
                </p>
                <label for="email" class="form-control">
                    <i class="las la-envelope"></i>
                    <input id="email" type="email" name="email" placeholder="email address">
                </label>

                <label for="password" class="form-control">
                    <i class="las la-key"></i>
                    <input id="password" type="password" name="password" placeholder="password">
                </label>
                <a href="" class="link-primary">Forgotten your password?</a>

                <label for="password" class="form-control">
                    <button type="submit" class="btn-primary">Sign in</button>
                </label>
            </form>
        </div>

        <img class="side-img" src="{{ asset('/img/west_downs.jpg') }}" alt="">
    </div>

@endsection
