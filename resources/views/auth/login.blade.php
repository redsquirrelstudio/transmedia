@extends('layouts.app')

@section('content')
    <section class="bg-red">
        @include('components/red-graphic')
        <form class="container content" method="post" action="{{ route('auth.login') }}">
            @csrf
            <div class="row">
                <div class="col-md-5">
                    <h2>
                        Student Login
                    </h2>
                    <p>
                        Login to edit your personal page using your University email address.
                        <br><br>
                        Haven't registered? <a href="{{ route('page.register') }}">Click here</a>
                    </p>
                </div>
            </div>
            <div class="row">
                <div class="col-md-5">
                    <label class="form-control" for="email">
                        <span>
                           Email Address
                        </span>
                        <input id="email" autocomplete="email" type="email" name="email" placeholder="University Email Address">
                    </label>
                    @error('email')
                    <p class="error">{{ $message }}</p>
                    @enderror
                </div>
            </div>
            <div class="row">
                <div class="col-md-5">
                    <label class="form-control" for="password">
                        <span>
                          Password
                        </span>
                        <input id="password" autocomplete="current-password" type="password" name="password" placeholder="Transmedia Password">
                    </label>
                    @error('password')
                    <p class="error">{{ $message }}</p>
                    @enderror
                    <br>
                    <a href="{{ route('page.forgot') }}">
                        Forgotten your password?
                    </a>
                </div>
            </div>
            <div class="row">
                <div class="col-md-5">
                    <button type="submit" class="btn btn-primary">Sign In</button>
                </div>
            </div>
        </form>

        @include('components/bottom-rip')
    </section>
@endsection
