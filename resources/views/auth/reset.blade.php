@extends('layouts.app')

@section('content')
    <div class="screen-block">
        <div class="auth-card">
            <div class="image-large">
                <img src="{{ asset('/images/robot_outline.png') }}" alt="Robot">
            </div>
            <form class="auth-form" method="post" action="{{ route('password.reset') }}">
                @csrf
                <h2>
                    Reset your password
                </h2>
                <p class="description">
                    Hi there, you'll have access to your account again soon! <br>
                    Enter your details below and we'll update your password.
                </p>

                <input type="hidden" name="token" value="{{ $token }}">

                <float-input name="email" icon="las la-envelope" label="Email" type="email"></float-input>
                @error('email')
                <p class="error">{{ $message }}</p>
                @enderror

                <float-input name="password" icon="las la-lock" label="New Password" type="password"></float-input>
                @error('password')
                <p class="error">{{ $message }}</p>
                @enderror

                <float-input name="password_confirmation" icon="las la-lock" label="Confirm New Password" type="hidden"></float-input>

                <button type="submit" class="btn-c2a">Update Password</button>
            </form>
        </div>
    </div>

@endsection
