@extends('layouts.app')

@section('content')
    <div class="screen-block">
        <div class="auth-card">
            <div class="image-large">
                <img src="{{ asset('/images/robot_outline.png') }}" alt="Robot">
            </div>
            <form class="auth-form" method="post" action="{{ route('auth.forgot') }}">
                @csrf
                <h2>
                    Forgot Password?
                </h2>
                <p class="description">
                    Sorry to hear you've forgotten your password! Enter your email below to get it reset. <br>
                    Just remembered it? <br>
                    <a href="{{ route('page.login') }}" class="link-primary">Click Here</a>
                </p>
                <float-input name="email" icon="las la-envelope" label="Email" type="email"></float-input>
                @error('email')
                <p class="error">{{ $message }}</p>
                @enderror

                <button type="submit" class="btn-c2a">Reset Password</button>
            </form>
        </div>
    </div>

@endsection
