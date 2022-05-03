@extends('layouts.app')

@section('content')
    <section class="bg-red">
        @include('components/red-graphic')
        <form class="container content" method="post" action="{{ route('auth.forgot') }}">
            @csrf
            <div class="row">
                <div class="col-md-5">
                    <h2>
                        Forgot Password?
                    </h2>
                    <p>
                        Sorry to hear you've forgotten your password! Enter your email below to get it reset. <br><br>
                        Just remembered it?  <a href="{{ route('page.login') }}">Click here</a>
                    </p>
                </div>
            </div>
            <div class="row">
                <div class="col-md-5">
                    <label class="form-control" for="email">
                        <span>
                           Email Address
                        </span>
                        <input id="email" autocomplete="email" type="email" name="email" placeholder="Your Email Address">
                    </label>
                    @error('email')
                    <p class="error">{{ $message }}</p>
                    @enderror
                </div>
            </div>
            <div class="row">
                <div class="col-md-5">
                    <button type="submit" class="btn btn-primary">Reset Password</button>
                </div>
            </div>
        </form>

        @include('components/bottom-rip')
    </section>

@endsection
