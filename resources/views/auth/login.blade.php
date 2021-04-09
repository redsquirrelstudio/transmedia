@extends('layouts.app')

@section('content')
    <div class="screen-block">
        <div class="auth-card">
            <div class="image-large">
                <img src="{{ asset('/images/robot_outline.png') }}" alt="Robot">
            </div>
            <form class="auth-form" method="post" action="{{ route('auth.login') }}">
                @csrf
                <h2>
                    Student Login
                </h2>
                <p class="description">
                    Login to edit your personal page using your University email address.
                    If you haven't registered <br>
                    <a href="{{ route('page.register') }}" class="link-primary">Click Here</a>
                </p>
                <float-input name="email" icon="las la-envelope" label="Email" type="email" value="{{ old('email') }}"></float-input>
                @error('email')
                <p class="error">{{ $message }}</p>
                @enderror

                <float-input name="password" icon="las la-lock" label="Password" type="password"></float-input>

                @error('password')
                <p class="error">{{ $message }}</p>
                @enderror

                <a href="{{ route('page.forgot') }}" class="link-primary">Forgotten password?</a><br><br>

                <button type="submit" class="btn-c2a">Login</button>
            </form>
        </div>
    </div>

@endsection
