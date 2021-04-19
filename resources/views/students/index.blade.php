@extends('layouts.app')

@section('content')
    <div class="screen-block">
        <div class="students-header">
            <img src="{{ asset('/images/wave_top.svg') }}" class="wave-top" />
            <h4>Digital Media Department</h4>
            <h2>Meet Our Students</h2>
            <div class="block-links small">
                <a href="#designers" class="block-link">
                    <img v-lazy="'{{ asset('/images/design_ident.jpg') }}'" alt="Designers">
                    <h4>Designers</h4>
                </a>
                <a href="#developers" class="block-link">
                    <img v-lazy="'{{ asset('/images/dev_ident.jpg') }}'" alt="Developers">
                    <h4>Developers</h4>
                </a>
                <a href="#cad" class="block-link">
                    <img v-lazy="'{{ asset('/images/cad_ident.jpg') }}'" alt="CAD">
                    <h4>Computer Aided Designers</h4>
                </a>
                <a href="#3d-design" class="block-link">
                    <img v-lazy="'{{ asset('/images/3d_ident.jpg') }}'" alt="3D">
                    <h4>3D Visualisation Artists</h4>
                </a>
                <a href="#3d-dev" class="block-link">
                    <img v-lazy="'{{ asset('/images/3ddev_ident.jpg') }}'" alt="3D">
                    <h4>3D Environments Developers</h4>
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
                    <a href="{{ route('students.year', ['course_slug' => 'designers', 'year' => 1]) }}">Year One</a>
                    <a href="{{ route('students.year', ['course_slug' => 'designers', 'year' => 2]) }}">Year Two</a>
                    <a href="{{ route('students.year', ['course_slug' => 'designers', 'year' => 3]) }}">Year Three</a>
                    <a href="{{ route('students.year', ['course_slug' => 'designers', 'year' => 4]) }}">MA</a>
                    <a href="{{ route('students.course', 'designers') }}" class="btn-c2a">
                        View All
                    </a>
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
                    <a href="{{ route('students.year', ['course_slug' => 'developers', 'year' => 1]) }}">Year One</a>
                    <a href="{{ route('students.year', ['course_slug' => 'developers', 'year' => 2]) }}">Year Two</a>
                    <a href="{{ route('students.year', ['course_slug' => 'developers', 'year' => 3]) }}">Year Three</a>
                    <a href="{{ route('students.course', 'developers') }}" class="btn-c2a">
                        View All
                    </a>
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
                    <a href="{{ route('students.year', ['course_slug' => 'cad', 'year' => 1]) }}">Year One</a>
                    <a href="{{ route('students.year', ['course_slug' => 'cad', 'year' => 2]) }}">Year Two</a>
                    <a href="{{ route('students.year', ['course_slug' => 'cad', 'year' => 3]) }}">Year Three</a>
                    <a href="{{ route('students.course', 'cad') }}" class="btn-c2a">
                        View All
                    </a>
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
            <div class="title left" id="3d-design">
                <h2>3D Visualisation Artists</h2>
            </div>
            <div class="carousel-container">
                <student-slider left :students="{{ json_encode($students['3d-artists']) }}">
                    <template v-slot:arrow>
                        <img class="arrow" src="{{ asset('/images/arrow_right.svg') }}" alt="->">
                    </template>
                </student-slider>
                <div class="filters uppercase">
                    <a href="{{ route('students.year', ['course_slug' => '3d-artists', 'year' => 1]) }}">Year One</a>
                    <a href="{{ route('students.year', ['course_slug' => '3d-artists', 'year' => 2]) }}">Year Two</a>
                    <a href="{{ route('students.year', ['course_slug' => '3d-artists', 'year' => 3]) }}">Year Three</a>
                    <a href="{{ route('students.year', ['course_slug' => '3d-artists', 'year' => 4]) }}">MA</a>
                    <a href="{{ route('students.course', '3d-artists') }}" class="btn-c2a">
                        View All
                    </a>
                </div>
            </div>
        </div>
    </div>
    <div class="screen-block scroll-anchor">
        <div class="carousel-block">
            <div class="title" id="cad">
                <h2>3D Environments Developers</h2>
            </div>
            <div class="carousel-container">
                <div class="filters uppercase">
                    <a href="{{ route('students.year', ['course_slug' => '3d-devs', 'year' => 1]) }}">Year One</a>
                    <a href="{{ route('students.year', ['course_slug' => '3d-devs', 'year' => 2]) }}">Year Two</a>
                    <a href="{{ route('students.year', ['course_slug' => '3d-devs', 'year' => 3]) }}">Year Three</a>
                    <a href="{{ route('students.course', '3d-devs') }}" class="btn-c2a">
                        View All
                    </a>
                </div>

                <student-slider :students="{{ json_encode($students['3d-devs']) }}">
                    <template v-slot:arrow>
                        <img class="arrow" src="{{ asset('/images/arrow_right.svg') }}" alt="->">
                    </template>
                </student-slider>
            </div>
        </div>
    </div>
@endsection
