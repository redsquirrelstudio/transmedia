@extends('layouts.app')

@section('content')
    <section class="bg-red">
        @include('components/red-graphic-3')
        <form class="container content" method="post" action="{{ route('auth.reset') }}">
            @csrf
            <div class="row">
                <div class="col-md-5">
                    <h2>
                        Reset your password
                    </h2>
                    <p>
                        Hi there, you'll have access to your account again soon! <br>
                        Enter your details below and we'll update your password.
                    </p>
                </div>
            </div>
            <input type="hidden" name="token" value="{{ $token }}">
            <div class="row">
                <div class="col-md-6">
                    <label class="form-control" for="email">
                        <span>
                           Email Address
                        </span>
                        <input id="email" autocomplete="email" type="email" name="email"
                               placeholder="University Email Address">
                    </label>
                    @error('email')
                    <p class="error">{{ $message }}</p>
                    @enderror
                </div>
            </div>
            <div class="row">
                <div class="col-md-6">
                    <label class="form-control" for="password">
                        <span>
                          New Password
                        </span>
                        <input id="password" autocomplete="current-password" type="password" name="password"
                               placeholder="Password">
                    </label>
                    @error('password')
                    <p class="error">{{ $message }}</p>
                    @enderror
                    <br>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6">
                    <label class="form-control" for="password_confirmation">
                        <span>
                          Confirm Password
                        </span>
                        <input id="password_confirmation" autocomplete="current-password"
                               type="password" name="password_confirmation" placeholder="Confirm your password">
                    </label>
                    @error('password_confirmation')
                    <p class="error">{{ $message }}</p>
                    @enderror
                    <br>
                </div>
            </div>
            <div class="row">
                <div class="col-md-5">
                    <button type="submit" class="btn btn-primary">Reset Your Password</button>
                </div>
            </div>
        </form>

        @include('components/bottom-rip')
    </section>
@endsection
