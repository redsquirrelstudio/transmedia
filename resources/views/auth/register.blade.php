@extends('layouts.app')

@section('content')
    <section class="bg-red">
        @include('components/red-graphic-3')
        <form class="container content" method="post" action="{{ route('auth.register') }}">
            @csrf
            <div class="row">
                <div class="col-md-5">
                    <h2>
                        Student Register
                    </h2>
                    <p>
                        Register your Transmedia account to edit your own page.
                        Make sure to use your University email address. <br><br>
                        Already have an account?
                        <a href="{{ route('page.login') }}" class="link-primary">Click Here</a>.
                    </p>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6">
                    <label class="form-control" for="email">
                        <span>
                           Your Name
                        </span>
                        <input id="name" type="text" name="name" placeholder="Enter your name as it appears on the university register">
                    </label>
                    @error('name')
                    <p class="error">{{ $message }}</p>
                    @enderror
                </div>
            </div>
            <div class="row">
                <div class="col-md-6">
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
                <div class="col-md-3">
                    <label class="form-control" for="password">
                        <span>
                          Password
                        </span>
                        <input id="password" autocomplete="current-password" type="password" name="password" placeholder="Password">
                    </label>
                    @error('password')
                    <p class="error">{{ $message }}</p>
                    @enderror
                    <br>
                </div>
                <div class="col-md-3">
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
                <div class="col-md-6">
                    <label class="form-control" for="year">
                        <span>
                            Which year are you in?
                        </span>
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
                </div>
            </div>
            <div class="row">
                <div class="col-md-5">
                    <button type="submit" class="btn btn-primary">Register For Transmedia</button>
                </div>
            </div>
        </form>

        @include('components/bottom-rip')
    </section>
@endsection
