@extends('layouts.app')

@section('content')
    <div class="top">
        <div class="auth-card">
            <form action="{{ route('auth.register') }}" method="post">
                @csrf
                <h2>
                    Register your Account
                </h2>
                <p>
                    If you are a DMD student, please register an account using your university email address.
                    The password can be anything you like. Creating an account will allow you to post your profile and
                    work
                    to the site for the Transmedia event.
                </p>
                <label for="email" class="form-control">
                    <i class="las la-envelope @error('email') is-invalid @enderror"></i>
                    <input @error('email') class="is-invalid" @enderror id="email" type="email" name="email" placeholder="university email address" value="{{ old('email') }}">
                    @error('email')
                    <p class="error">{{ $message }}</p>
                    @enderror
                </label>

                <label for="year" class="form-control">
                    <i class="las la-graduation-cap select-icon @error('year') is-invalid @enderror"></i>
                    <select @error('year') class="is-invalid" @enderror name="year" id="year">
                        <option value="null" disabled selected>Select your year group</option>
                        <option value="1">1st Year</option>
                        <option value="2">2nd Year</option>
                        <option value="3">3rd Year</option>
                        <option value="4">MA</option>
                    </select>
                    @error('year')
                    <p class="error">{{ $message }}</p>
                    @enderror
                </label>

                <label for="name" class="form-control">
                    <i class="las la-user @error('name') is-invalid @enderror"></i>
                    <input  @error('name') class="is-invalid" @enderror id="name" type="text" name="name" placeholder="Your name" value="{{ old('name') }}">
                    @error('name')
                    <p class="error">{{ $message }}</p>
                    @enderror
                </label>

                <label for="password" class="form-control">
                    <i class="las la-key @error('password') is-invalid @enderror"></i>
                    <input @error('password') class="is-invalid" @enderror id="password" type="password" name="password" placeholder="password">
                    @error('password')
                    <p class="error">{{ $message }}</p>
                    @enderror
                </label>

                <label for="password_confirmation" class="form-control">
                    <i class="las la-lock"></i>
                    <input id="password_confirmation" type="password" name="password_confirmation"
                           placeholder="confirm password">
                </label>
                <label for="register" class="form-control">
                    <button id="register" class="btn-primary" type="submit">Register</button>
                </label>
            </form>
        </div>
        <img class="side-img" src="{{ asset('/images/west_downs.jpg') }}" alt="">
    </div>

@endsection
