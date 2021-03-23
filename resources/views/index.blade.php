@extends('layouts.app')

@section('content')
    <div class="content-block screen">
        <div class="logo-container">
            <img class="logo" src="{{ asset('img/logo_clear.png') }}" alt="Transmedia 2021">
            <div class="background-circle">
                <div class="border-circle"></div>
            </div>
        </div>
    </div>
    <div id="about" class="content-block">
        <div class="about">
            <h2>
                About the Exhibition
            </h2>
            <div class="about-content">
                <p>
                    The Transmedia exhibition is an annual end of year show for the Digital media courses to showcase their
                    best work to both students in other courses and industry professionals.<br><br>
                    This site is the center for all information about the event. Here you'll find information about
                    students,
                    examples of their work and their specialisms. The option to walk around our virtual exhibition is also
                    available where you can view work within a 3D gallery like space. <br><br>
                    Whilst browsing you will find the best examples of digital design, development, CAD and 3D art
                    the University of Winchester has to offer.
                    <br>
                    <a href="{{ url('/exhibition') }}" class="btn-primary">
                        Enter the Exhibition
                    </a>
                </p>
            </div>
        </div>
    </div>
    <div class="content-block">
        <h2>Our Students</h2>
        <div class="students">
            @include('includes/students')
        </div>
    </div>

@endsection
