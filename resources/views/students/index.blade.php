@extends('layouts.app')

@section('content')
    <div class="screen-block">
        <div class="students-header">
            <img src="{{ asset('/images/wave_top.svg') }}" class="wave-top" />
            <h4>Digital Media Department</h4>
            <h2>Meet Our Students</h2>
            <div class="course-links">
                <a href="#designers" class="course-link">
                    <img src="{{ asset('/images/design_ident.jpg') }}" alt="Designers">
                    <h4>Designers</h4>
                </a>
                <a href="#developers" class="course-link">
                    <img src="{{ asset('/images/dev_ident.jpg') }}" alt="Developers">
                    <h4>Developers</h4>
                </a>
                <a href="#cad" class="course-link">
                    <img src="{{ asset('/images/cad_ident.jpg') }}" alt="CAD">
                    <h4>Computer Aided Designers</h4>
                </a>
                <a href="#3d" class="course-link">
                    <img src="{{ asset('/images/3d_ident.jpg') }}" alt="3D">
                    <h4>3D Artists</h4>
                </a>
            </div>
        </div>
    </div>
    <div class="screen-block scroll-anchor">
        <div class="carousel-block pushed">
            <div class="title" id="designers">
                <h2 class="dark-background">Designers</h2>
            </div>
            <div class="carousel-container">
                <div class="filters uppercase">
                    <a href="">Year One</a>
                    <a href="">Year Two</a>
                    <a href="">Year Three</a>
                    <a href="">MA</a>
                </div>

                <student-slider :students="{{ json_encode($students['designers']) }}">
                    <template v-slot:arrow>
                        <img class="arrow" src="{{ asset('/images/arrow_right.svg') }}" alt="->">
                    </template>
                </student-slider>
            </div>
        </div>
    </div>
    <div class="screen-block scroll-anchor" >
        <div class="carousel-block">
            <div class="title left" id="developers">
                <h2>Developers</h2>
            </div>
            <div class="carousel-container">
                <student-slider left :students="{{ json_encode($students['developers']) }}">
                    <template v-slot:arrow>
                        <img class="arrow" src="{{ asset('/images/arrow_right.svg') }}" alt="->">
                    </template>
                </student-slider>
                <div class="filters uppercase">
                    <a href="">Year One</a>
                    <a href="">Year Two</a>
                    <a href="">Year Three</a>
                    <a href="">MA</a>
                </div>
            </div>
        </div>
    </div>
    <div class="screen-block scroll-anchor">
        <div class="carousel-block">
            <div class="title" id="cad">
                <h2>Computer Aided Designers</h2>
            </div>
            <div class="carousel-container">
                <div class="filters uppercase">
                    <a href="">Year One</a>
                    <a href="">Year Two</a>
                    <a href="">Year Three</a>
                    <a href="">MA</a>
                </div>

                <student-slider :students="{{ json_encode($students['cad']) }}">
                    <template v-slot:arrow>
                        <img class="arrow" src="{{ asset('/images/arrow_right.svg') }}" alt="->">
                    </template>
                </student-slider>
            </div>
        </div>
    </div>
    <div class="screen-block scroll-anchor" >
        <div class="carousel-block">
            <div class="title left" id="3d">
                <h2>3D Artists</h2>
            </div>
            <div class="carousel-container">
                <student-slider left :students="{{ json_encode($students['3d-artists']) }}">
                    <template v-slot:arrow>
                        <img class="arrow" src="{{ asset('/images/arrow_right.svg') }}" alt="->">
                    </template>
                </student-slider>
                <div class="filters uppercase">
                    <a href="">Year One</a>
                    <a href="">Year Two</a>
                    <a href="">Year Three</a>
                    <a href="">MA</a>
                </div>
            </div>
        </div>
    </div>
@endsection
