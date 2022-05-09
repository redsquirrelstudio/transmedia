@extends('layouts.app')

@section('content')

    <section class="bg-red">
        <div class="container content">
            <div class="row">
                <div class="col-md-4">
                    <div class="content">
                        <h2>Meet Our Students</h2>
                        <p>
                            Our talented students have a wide variety of skill sets which they use to create some
                            amazing pieces of work.
                            This wide diversity allows for students to work in a work-place like environment so that
                            they can develop their
                            team working skills.
                        </p>
                    </div>
                </div>
                <div class="col-md-2">
                </div>
                <div class="col-md-3">
                    <a href="#designers" class="discipline-card design">
                        <img class="vector" src="{{ asset('images/2022/designer_ident.svg') }}" alt="">
                        <div class="caption">
                            Designers
                        </div>
                    </a>
                </div>
                <div class="col-md-3">
                    <a href="#3d-environments-developers" class="discipline-card three-d">
                        <img class="vector" src="{{ asset('images/2022/3d_dev_ident.svg') }}" alt="">
                        <div class="caption">
                            3D Environments Developers
                        </div>
                    </a>
                </div>
                <div class="col-md-3">
                    <a href="#developers" class="discipline-card development">
                        <img class="vector" src="{{ asset('images/2022/dev_ident.svg') }}" alt="">
                        <div class="caption">
                            Developers
                        </div>
                    </a>
                </div>
                <div class="col-md-3">
                    <a href="#3d-visualisation-artists" class="discipline-card three-d-vis">
                        <img class="vector" src="{{ asset('images/2022/3d_vis_ident.svg') }}" alt="">
                        <div class="caption">
                            3D Visualisation <br>Artists
                        </div>
                    </a>
                </div>
                <div class="col-md-3">
                    <a href="#games-designers" class="discipline-card game-design">
                        <img class="vector" src="{{ asset('images/2022/game_design_ident.svg') }}" alt="">
                        <div class="caption">
                            Games Designers and Developers
                        </div>
                    </a>
                </div>
                <div class="col-md-3">
                    <a href="#cad" class="discipline-card cad">
                        <img class="vector" src="{{ asset('images/2022/cad_ident.svg') }}" alt="">
                        <div class="caption">
                            Computer Aided Designers
                        </div>
                    </a>
                </div>
            </div>
        </div>
        @include('components/red-graphic')
        @include('components/bottom-rip')
    </section>

    <section class="bg-gray" id="designers">
        <div class="container">
            <div class="row">
                <div class="col-md-6">
                    <div class="content">
                        <h2>
                            Designers
                        </h2>
                        <p>
                            Our BA (Hons) Digital Media Design programme has been running since its validation in 2007,
                            gaining in popularity with a growing student cohort for areas such as graphic design, app
                            and
                            web design, UX/UI and Design Thinking, game/interaction design, VR and AR interface
                            design...
                        </p>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-3">
                    <a class="btn btn-secondary" href="{{ url('/students/course/designers/year/1') }}">Year One</a>
                </div>
                <div class="col-md-3">
                    <a class="btn btn-secondary" href="{{ url('/students/course/designers/year/2') }}">Year Two</a>
                </div>
                <div class="col-md-3">
                    <a class="btn btn-secondary" href="{{ url('/students/course/designers/year/3') }}">Year Three</a>
                </div>
            </div>
            <div class="row mt-6">
                <div class="col-md-12">
                    <div class="row" x-data="studentSliderDesigners()">
                        @foreach($students['designers'] as $key => $student)
                            <div x-show="slide == {{ floor($key / 4) }}"
                                 x-transition:enter="scale-enter"
                                 x-transition:enter-start="scale-enter-start"
                                 x-transition:enter-end="scale-enter-end"
                                 x-transition:leave="scale-leave"
                                 x-transition:leave-start="scale-leave-start"
                                 x-transition:leave-end="scale-leave-end"
                                 class="col-sm-3">
                                <a href="{{ url('/students/'.$student->slug) }}" class="discipline-card">
                                    <img src="{{ $student->page->avatar_image->file_url }}" alt="">
                                </a>
                            </div>
                        @endforeach
                    </div>

                    <script>
                        function studentSliderDesigners() {
                            return {
                                slide: 0,
                                interval: null,
                                init() {
                                    this.resetInterval();
                                },
                                resetInterval() {
                                    clearInterval(this.interval);
                                    this.interval = setInterval(() => {
                                        this.forward();
                                    }, 5000);
                                },
                                forward() {
                                    if (this.slide === {{ floor(count($students['designers']) / 4) - 1 }}) {
                                        this.slide = 0;
                                    } else {
                                        this.slide++;
                                    }
                                    this.resetInterval();
                                },
                                backward() {
                                    this.slide = this.slide - (this.slide === 0 ? -{{ (count($students['designers']) / 4) - 1 }} : 1);
                                    this.resetInterval();
                                },
                                goTo(index) {
                                    this.slide = index;
                                    this.resetInterval();
                                }
                            };
                        }
                    </script>
                </div>
            </div>

        </div>
    </section>
    <section class="bg-red" id="developers">
        @include('components/top-rip')
        <div class="container">
            <div class="row">
                <div class="col-md-6"></div>
                <div class="col-md-6">
                    <div class="content">
                        <h2>
                            Developers
                        </h2>
                        <p>
                            Our BSc (Hons) Digital Media Development programme has also been running since its
                            validation in 2007, usually a smaller cohort than designers but just as important for areas
                            such as app and web development, UX/UI and Design Thinking, game/interaction development, VR
                            and AR development...
                        </p>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-3">
                </div>
                <div class="col-md-3">
                    <a class="btn btn-primary" href="{{ url('/students/course/developers/year/1') }}">Year One</a>
                </div>
                <div class="col-md-3">
                    <a class="btn btn-primary" href="{{ url('/students/course/developers/year/2') }}">Year Two</a>
                </div>
                <div class="col-md-3">
                    <a class="btn btn-primary" href="{{ url('/students/course/developers/year/3') }}">Year Three</a>
                </div>
            </div>

            <div class="row mt-6">
                <div class="col-md-12">
                    <div class="row" x-data="studentSliderDevelopers()">
                        @foreach($students['developers'] as $key => $student)
                            <div x-show="slide == {{ floor($key / 4) }}"
                                 x-transition:enter="scale-enter"
                                 x-transition:enter-start="scale-enter-start"
                                 x-transition:enter-end="scale-enter-end"
                                 x-transition:leave="scale-leave"
                                 x-transition:leave-start="scale-leave-start"
                                 x-transition:leave-end="scale-leave-end"
                                 class="col-sm-3">
                                <a href="{{ url('/students/'.$student->slug) }}" class="discipline-card">
                                    <img src="{{ $student->page->avatar_image->file_url }}" alt="">
                                </a>
                            </div>
                        @endforeach
                    </div>

                    <script>
                        function studentSliderDevelopers() {
                            return {
                                slide: 0,
                                interval: null,
                                init() {
                                    this.resetInterval();
                                },
                                resetInterval() {
                                    clearInterval(this.interval);
                                    this.interval = setInterval(() => {
                                        this.forward();
                                    }, 5000);
                                },
                                forward() {
                                    if (this.slide === {{ floor(count($students['developers']) / 4) - 1 }}) {
                                        this.slide = 0;
                                    } else {
                                        this.slide++;
                                    }
                                    this.resetInterval();
                                },
                                backward() {
                                    this.slide = this.slide - (this.slide === 0 ? -{{ (count($students['developers']) / 4) - 1 }} : 1);
                                    this.resetInterval();
                                },
                                goTo(index) {
                                    this.slide = index;
                                    this.resetInterval();
                                }
                            };
                        }
                    </script>
                </div>
            </div>

        </div>
        @include('components/bottom-rip')
    </section>
    <section class="bg-gray" id="cad">
        <div class="container">
            <div class="row">
                <div class="col-md-6">
                    <div class="content">
                        <h2>
                            Computer Aided Designers
                        </h2>
                        <p>
                            The BSc (Hons) Computer Aided Design programme is a reasonably new programme, validated as
                            part of our suite of programmes in 2018. This year is therefore the first in having a cohort
                            in all three years...
                        </p>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-3">
                    <a class="btn btn-secondary" href="{{ url('/students/course/cad/year/1') }}">Year One</a>
                </div>
                <div class="col-md-3">
                    <a class="btn btn-secondary" href="{{ url('/students/course/cad/year/2') }}">Year Two</a>
                </div>
                <div class="col-md-3">
                    <a class="btn btn-secondary" href="{{ url('/students/course/cad/year/3') }}">Year Three</a>
                </div>
            </div>

            <div class="row mt-6">
                <div class="col-md-12">
                    <div class="row" x-data="studentSliderCad()">
                        @foreach($students['cad'] as $key => $student)
                            <div x-show="slide == {{ floor($key / 4) }}"
                                 x-transition:enter="scale-enter"
                                 x-transition:enter-start="scale-enter-start"
                                 x-transition:enter-end="scale-enter-end"
                                 x-transition:leave="scale-leave"
                                 x-transition:leave-start="scale-leave-start"
                                 x-transition:leave-end="scale-leave-end"
                                 class="col-sm-3">
                                <a href="{{ url('/students/'.$student->slug) }}" class="discipline-card">
                                    <img src="{{ $student->page->avatar_image->file_url }}" alt="">
                                </a>
                            </div>
                        @endforeach
                    </div>

                    <script>
                        function studentSliderCad() {
                            return {
                                slide: 0,
                                interval: null,
                                init() {
                                    this.resetInterval();
                                },
                                resetInterval() {
                                    clearInterval(this.interval);
                                    this.interval = setInterval(() => {
                                        this.forward();
                                    }, 5000);
                                },
                                forward() {
                                    if (this.slide === {{ floor(count($students['cad']) / 4) - 1 }}) {
                                        this.slide = 0;
                                    } else {
                                        this.slide++;
                                    }
                                    this.resetInterval();
                                },
                                backward() {
                                    this.slide = this.slide - (this.slide === 0 ? -{{ (count($students['cad']) / 4) - 1 }} : 1);
                                    this.resetInterval();
                                },
                                goTo(index) {
                                    this.slide = index;
                                    this.resetInterval();
                                }
                            };
                        }
                    </script>
                </div>
            </div>
        </div>
    </section>
    <section class="bg-red" id="3d-visualisation-artists">
        @include('components/top-rip')
        <div class="container">
            <div class="row">
                <div class="col-md-6"></div>
                <div class="col-md-6">
                    <div class="content">
                        <h2>
                            3D Visualisation Artists
                        </h2>
                        <p>
                            Our BA (Hons) Digital Media Design in 3D Visualisation programme is a new programme now in
                            its 3rd year. In 3D Vis, we learn how to model in 3D for creating models, visualisations,
                            characters, 3D printing assets for many areas such as AR, VR, game, animations, advertising,
                            and product visuals...
                        </p>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-3">
                </div>
                <div class="col-md-3">
                    <a class="btn btn-primary" href="{{ url('/students/course/3d-artists/year/1') }}">Year One</a>
                </div>
                <div class="col-md-3">
                    <a class="btn btn-primary" href="{{ url('/students/course/3d-artists/year/2') }}">Year Two</a>
                </div>
                <div class="col-md-3">
                    <a class="btn btn-primary" href="{{ url('/students/course/3d-artists/year/3') }}">Year Three</a>
                </div>
            </div>
            <div class="row mt-6">
                <div class="col-md-12">
                    <div class="row" x-data="studentSlider3dArtists()">
                        @foreach($students['3d-artists'] as $key => $student)
                            <div x-show="slide == {{ floor($key / 4) }}"
                                 x-transition:enter="scale-enter"
                                 x-transition:enter-start="scale-enter-start"
                                 x-transition:enter-end="scale-enter-end"
                                 x-transition:leave="scale-leave"
                                 x-transition:leave-start="scale-leave-start"
                                 x-transition:leave-end="scale-leave-end"
                                 class="col-sm-3">
                                <a href="{{ url('/students/'.$student->slug) }}" class="discipline-card">
                                    <img src="{{ $student->page->avatar_image->file_url }}" alt="">
                                </a>
                            </div>
                        @endforeach
                    </div>

                    <script>
                        function studentSlider3dArtists() {
                            return {
                                slide: 0,
                                interval: null,
                                init() {
                                    this.resetInterval();
                                },
                                resetInterval() {
                                    clearInterval(this.interval);
                                    this.interval = setInterval(() => {
                                        this.forward();
                                    }, 5000);
                                },
                                forward() {
                                    if (this.slide === {{ floor(count($students['3d-artists']) / 4) - 1 }}) {
                                        this.slide = 0;
                                    } else {
                                        this.slide++;
                                    }
                                    this.resetInterval();
                                },
                                backward() {
                                    this.slide = this.slide - (this.slide === 0 ? -{{ (count($students['3d-artists']) / 4) - 1 }} : 1);
                                    this.resetInterval();
                                },
                                goTo(index) {
                                    this.slide = index;
                                    this.resetInterval();
                                }
                            };
                        }
                    </script>
                </div>
            </div>
        </div>
        @include('components/bottom-rip')
    </section>
    <section class="bg-gray" id="3d-environments-developers">
        <div class="container">
            <div class="row">
                <div class="col-md-6">
                    <div class="content">
                        <h2>
                            3D Environments Developers
                        </h2>
                        <p>
                            Our BSc (Hons) Digital Media Development in 3D Environments (Game & Heritage programme is
                            also a new programme now in its 3rd year. In 3D Environments, we also learn how to model in
                            3D for creating models and environments and learn how to use Unity and/or Unreal to create
                            Environments for use in Game or Heritage applications...
                        </p>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-3">
                    <a class="btn btn-secondary" href="{{ url('/students/course/3d-devs/year/1') }}">Year One</a>
                </div>
                <div class="col-md-3">
                    <a class="btn btn-secondary" href="{{ url('/students/course/3d-devs/year/2') }}">Year Two</a>
                </div>
                <div class="col-md-3">
                    <a class="btn btn-secondary" href="{{ url('/students/course/3d-devs/year/3') }}">Year Three</a>
                </div>
            </div>
            <div class="row mt-6">
                <div class="col-md-12">
                    <div class="row" x-data="studentSlider3dDevs()">
                        @foreach($students['3d-devs'] as $key => $student)
                            <div x-show="slide == {{ floor($key / 4) }}"
                                 x-transition:enter="scale-enter"
                                 x-transition:enter-start="scale-enter-start"
                                 x-transition:enter-end="scale-enter-end"
                                 x-transition:leave="scale-leave"
                                 x-transition:leave-start="scale-leave-start"
                                 x-transition:leave-end="scale-leave-end"
                                 class="col-sm-3">
                                <a href="{{ url('/students/'.$student->slug) }}" class="discipline-card">
                                    <img src="{{ $student->page->avatar_image->file_url }}" alt="">
                                </a>
                            </div>
                        @endforeach
                    </div>

                    <script>
                        function studentSlider3dDevs() {
                            return {
                                slide: 0,
                                interval: null,
                                init() {
                                    this.resetInterval();
                                },
                                resetInterval() {
                                    clearInterval(this.interval);
                                    this.interval = setInterval(() => {
                                        this.forward();
                                    }, 5000);
                                },
                                forward() {
                                    if (this.slide === {{ floor(count($students['3d-devs']) / 4) - 1 }}) {
                                        this.slide = 0;
                                    } else {
                                        this.slide++;
                                    }
                                    this.resetInterval();
                                },
                                backward() {
                                    this.slide = this.slide - (this.slide === 0 ? -{{ (count($students['3d-devs']) / 4) - 1 }} : 1);
                                    this.resetInterval();
                                },
                                goTo(index) {
                                    this.slide = index;
                                    this.resetInterval();
                                }
                            };
                        }
                    </script>
                </div>
            </div>
        </div>
    </section>
    <section class="bg-red" id="games-designers">
        @include('components/top-rip')
        <div class="container">
            <div class="row">
                <div class="col-md-6"></div>
                <div class="col-md-6">
                    <div class="content">
                        <h2>
                            Games Designers and Developers
                        </h2>
                        <p>
                            Our BSc (Hons) Computer Game Design & Development is our latest programme to add to the
                            Digital Media suite, and is just completing its first year. We have been learning Unity and
                            Unreal Game Engines, the mechanics of Game play, and art styles. We are encouraged to work
                            collaboratively with our peers and develop individual approaches to gaming and serious game
                            play/gamification.
                        </p>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-3">
                </div>
                <div class="col-md-3">
                    <a class="btn btn-primary" href="{{ url('/students/course/games-designers/year/1') }}">Year One</a>
                </div>
                <div class="col-md-3">
                    <a class="btn btn-primary" href="{{ url('/students/course/games-designers/year/2') }}">Year Two</a>
                </div>
                <div class="col-md-3">
                    <a class="btn btn-primary" href="{{ url('/students/course/games-designers/year/3') }}">Year
                        Three</a>
                </div>
            </div>
            <div class="row mt-6">
                <div class="col-md-12">
                    <div class="row" x-data="studentSliderGames()">
                        @foreach($students['game-designers'] as $key => $student)
                            <div x-show="slide == {{ floor($key / 4) }}"
                                 x-transition:enter="scale-enter"
                                 x-transition:enter-start="scale-enter-start"
                                 x-transition:enter-end="scale-enter-end"
                                 x-transition:leave="scale-leave"
                                 x-transition:leave-start="scale-leave-start"
                                 x-transition:leave-end="scale-leave-end"
                                 class="col-sm-3">
                                <a href="{{ url('/students/'.$student->slug) }}" class="discipline-card">
                                    <img src="{{ $student->page->avatar_image->file_url }}" alt="">
                                </a>
                            </div>
                        @endforeach
                    </div>

                    <script>
                        function studentSliderGames() {
                            return {
                                slide: 0,
                                interval: null,
                                init() {
                                    this.resetInterval();
                                },
                                resetInterval() {
                                    clearInterval(this.interval);
                                    this.interval = setInterval(() => {
                                        this.forward();
                                    }, 5000);
                                },
                                forward() {
                                    if (this.slide === {{ floor(count($students['game-designers']) / 4) - 1 }}) {
                                        this.slide = 0;
                                    } else {
                                        this.slide++;
                                    }
                                    this.resetInterval();
                                },
                                backward() {
                                    this.slide = this.slide - (this.slide === 0 ? -{{ (count($students['game-designers']) / 4) - 1 }} : 1);
                                    this.resetInterval();
                                },
                                goTo(index) {
                                    this.slide = index;
                                    this.resetInterval();
                                }
                            };
                        }
                    </script>
                </div>
            </div>

        </div>
        @include('components/bottom-rip')
    </section>
@endsection
