@extends('layouts.app')

@section('content')
    <div class="screen-block">
        <div class="auth-card">
            <div class="image-large">
                <img src="{{ asset('/images/robot_outline.png') }}" alt="Robot">
            </div>
            <form class="auth-form" method="post" action="{{ route('auth.register') }}">
                @csrf
                <h2>
                    Student Register
                </h2>
                <p class="description">
                    Register your Transmedia account to edit your own page. <br>
                    Make sure to use your University email address. If you already have an account <br>
                    <a href="{{ route('page.login') }}" class="link-primary">Click Here</a>
                </p>

                <float-input name="email" icon="las la-envelope" label="Email" type="email"
                             value="{{ old('email') }}"></float-input>
                @error('email')
                <p class="error">{{ $message }}</p>
                @enderror

                <float-input name="name" icon="las la-user" label="Name" type="text"
                             value="{{ old('name') }}"></float-input>
                @error('name')
                <p class="error">{{ $message }}</p>
                @enderror

                <float-input name="password" icon="las la-lock" label="Password" type="password"></float-input>
                @error('password')
                <p class="error">{{ $message }}</p>
                @enderror

                <float-input name="password_confirmation" icon="las la-lock" label="Confirm Password" type="password"></float-input>

                <label for="year" class="auth-select">
                    <select @error('year') class="is-invalid" @enderror name="year" id="year">
                        <option value="null" disabled selected>Select your year group</option>
                        <option value="1">1st Year</option>
                        <option value="2">2nd Year</option>
                        <option value="3">3rd Year</option>
                        <option value="4">MA</option>
                    </select>
                </label>
                @error('year')
                <p class="error">{{ $message }}</p>
                @enderror

                <button type="submit" class="btn-c2a">Register</button>
            </form>
        </div>
    </div>

@endsection
