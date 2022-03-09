@extends('layouts.app')

@section('content')
    @if(Options::get('show-stream') && env('YOUTUBE_EMBED_ID'))
        <div class="hero-slider">
            <iframe width="100%" height="100%" src="https://www.youtube.com/embed/{{ env('YOUTUBE_EMBED_ID') }}"
                    title="YouTube video player" frameborder="0" controls="0"
                    allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"
                    allowfullscreen></iframe>
        </div>
    @else
        <hero-slider :slides="[
            {
            id: 1,
            title: 'Virtual Exhibition',
            subtitle: 'Our Hall Of Fame',
            link_text: 'Get Started',
            link_href: '{{ url('/exhibition') }}',
            src: '{{ asset('/video/transmedia_virtual_expo.mp4') }}',
            type: 'video',
            },
            {
            id: 2,
            title: '2021 Projects',
            subtitle: 'Highlights from the year',
            link_text: 'View Projects',
            link_href: '{{ url('/projects') }}',
            src: '{{ asset('/video/alutech_show_reel.mp4') }}',
            type: 'video',
            },
            {
            id: 3,
            title: 'Transmedia Exhibition',
            subtitle: `View Student's work from 6th May to 5th June`,
            link_text: 'View The Students',
            link_href: '{{ url('/students') }}',
            src: '{{ asset('/video/westdowns.mp4') }}',
            type: 'video',
            }
            ]"></hero-slider>
    @endif

    <div class="screen-block">
        <div class="welcome-block scroll-anchor">
            <div class="video-block">
                <video autoplay muted loop>
                    <source src="{{ asset('/video/transmedia_square_dark.mp4') }}" type="video/mp4">
                </video>
            </div>
            <div class="welcome-message">
                <hr>
                <div class="indent">
                    <h2>
                        Hi there!
                    </h2>
                    <p>
                        The Transmedia Exhibition is our annual End of Year Exhibition, covering all of our Digital
                        Media programmes, our platform to showcase our best work. <br><br>

                        Please join us on the 6th May 2021, when we can proudly introduce you to our amazing virtual
                        gallery and our individual student portfolios which will be found on this website. <br><br>

                        You will also be able to watch our 3rd year cohort present their business ideas to a panel of
                        judges in ‘Pitch Your Project’, via Teams. There will be two awards the 3rd years will be
                        competing for: ‘The Best Pitch 2021’ and ‘The Most Commercially Viable Business Idea 2021’. <br><br>
                    </p>
                    <a href="{{ url('/about') }}" class="btn-c2a">
                        Find Out More
                    </a>
                </div>
            </div>
        </div>
    </div>
    <div class="screen-block">
        <div class="live-block scroll-anchor tinted">
            <img
                src="https://images.unsplash.com/photo-1505373877841-8d25f7d46678?ixlib=rb-1.2.1&ixid=MXwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHw%3D&auto=format&fit=crop&w=1300&q=80"
                alt="">
            <div class="caption">
                <h1>We are with you live</h1>
                <h2>Thursday 06.05.2021</h2>
                <a href="{{ route('page.schedule') }}" class="btn-c2a">
                    Find Out More
                </a>
            </div>
        </div>
    </div>
    @if($projects->count() > 0)
        <div class="screen-block scroll-anchor">
            <div class="carousel-block">
                <div class="title">
                    <h2>{{ date('Y') }} Projects</h2>
                </div>
                <div class="carousel-container">
                    <div class="filters">
                        <h2>Digital Media Courses</h2>
                        <a href="{{ route('students.course', 'designers') }}">Digital Media Design</a>
                        <a href="{{ route('students.course', 'developers') }}">Digital Media Development</a>
                        <a href="{{ route('students.course', '3d-artists') }}">3D Visualisation Design</a>
                        <a href="{{ route('students.course', '3d-devs') }}">3D Environments Development</a>
                        <a href="{{ route('students.course', 'cad') }}">Computer Aided Design</a>
                        <a href="{{ route('students.index') }}" class="btn-c2a">
                            View All
                        </a>
                    </div>
                    <project-slider :projects="{{ $projects }}">
                        <template v-slot:arrow>
                            <img class="arrow" src="{{ asset('/images/arrow_right.svg') }}" alt="->">
                        </template>
                    </project-slider>
                </div>

            </div>
        </div>
    @endif
    <div class="screen-block">
        <div class="course-block scroll-anchor">
            <div class="course">
                <h4>Digital Media Courses</h4>
                <h2>Designers</h2>
                <p>
                    Our BA (Hons) Digital Media Design programme has been running since its validation in 2007,
                    gaining in popularity with a growing student cohort for areas such as graphic design, app and
                    web design, UX/UI and Design Thinking, game/interaction design, VR and AR interface design...
                </p>
                <a href="{{ url('/about#design') }}" class="btn-c2a">
                    Find Out More
                </a>
            </div>
            <div class="course">
                <h4>Digital Media Courses</h4>
                <h2>Developers</h2>
                <p>
                    Our BSc (Hons) Digital Media Development programme has also been running since its validation in
                    2007, usually a smaller cohort than designers but just as important for areas such as app and
                    web development, UX/UI and Design Thinking, game/interaction development, VR and AR development...
                </p>
                <a href="{{ url('/about#development') }}" class="btn-c2a">
                    Find Out More
                </a>
            </div>
            <div class="course">
                <h4>Digital Media Courses</h4>
                <h2>3D Visualisation</h2>
                <p>
                    Our BA (Hons) Digital Media Design in 3D Visualisation programme is a new programme now in its
                    3rd year. In 3D Vis, we learn how to model in 3D for creating models, visualisations,
                    characters, 3D printing assets for many areas such as AR, VR, game, animations, advertising, and
                    product visuals...
                </p>
                <a href="{{ url('/about#3dvis') }}" class="btn-c2a">
                    Find Out More
                </a>
            </div>
            <div class="course">
                <h4>Digital Media Courses</h4>
                <h2>3d Environments</h2>
                <p>
                    Our BSc (Hons) Digital Media Development in 3D Environments (Game & Heritage programme is also a
                    new programme now in its 3rd year. In 3D Environments, we also learn how to model in 3D for
                    creating models and environments and learn how to use Unity and/or Unreal to create Environments
                    for use in Game or Heritage applications...
                </p>
                <a href="{{ url('/about#3denvironments') }}" class="btn-c2a">
                    Find Out More
                </a>
            </div>
            <div class="course">
                <h4>Digital Media Courses</h4>
                <h2>CAD</h2>
                <p>
                    The BSc (Hons) Computer Aided Design programme is a reasonably new programme, validated as part
                    of our suite of programmes in 2018. This year is therefore the first in having a cohort in all
                    three years...
                </p>
                <a href="{{ url('/about#cad') }}" class="btn-c2a">
                    Find Out More
                </a>
            </div>

        </div>
    </div>
    <div class="screen-block scroll-anchor">
        <div class="carousel-block pushed">
            <div class="title">
                <h2 class="dark-background">Meet Our Students</h2>
            </div>
            <div class="carousel-container">
                <div class="filters">
                    <h2>Digital Media Courses</h2>
                    <a href="{{ route('students.course', 'designers') }}">Digital Media Design</a>
                    <a href="{{ route('students.course', 'developers') }}">Digital Media Development</a>
                    <a href="{{ route('students.course', '3d-artists') }}">3D Visualisation Design</a>
                    <a href="{{ route('students.course', '3d-devs') }}">3D Environments Development</a>
                    <a href="{{ route('students.course', 'cad') }}">Computer Aided Design</a>
                    <a href="{{ route('students.index') }}" class="btn-c2a">
                        View All
                    </a>
                </div>
                <student-slider :students="{{ $students }}">
                    <template v-slot:arrow>
                        <img class="arrow" src="{{ asset('/images/arrow_right.svg') }}" alt="->">
                    </template>
                </student-slider>
            </div>
        </div>
    </div>

@endsection
