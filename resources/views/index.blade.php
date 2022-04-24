@extends('layouts.app')

@section('content')

    <main class="home-page">
        @include('components/hero-slider')

        <section class="bg-gray">
            <div class="container">
                <div class="row">
                    <div class="col-md-3">
                        <div class="discipline-card large">
                            <img src="{{ asset('/images/west_downs_birdseye.jpg') }}" alt="West Downs">
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="discipline-card design">
                            <img class="vector" src="{{ asset('images/2022/designer_ident.svg') }}" alt="">
                            <div class="caption">
                                Designers
                            </div>
                        </div>
                        <div class="discipline-card three-d">
                            <img class="vector" src="{{ asset('images/2022/3d_dev_ident.svg') }}" alt="">
                            <div class="caption">
                                3D Environments Developers
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="discipline-card development">
                            <img class="vector" src="{{ asset('images/2022/dev_ident.svg') }}" alt="">
                            <div class="caption">
                                Developers
                            </div>
                        </div>
                        <div class="discipline-card three-d-vis">
                            <img class="vector" src="{{ asset('images/2022/3d_vis_ident.svg') }}" alt="">
                            <div class="caption">
                                3D Visualisation <br>Artists
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="discipline-card game-design">
                            <img class="vector" src="{{ asset('images/2022/game_design_ident.svg') }}" alt="">
                            <div class="caption">
                                Game Designers
                            </div>
                        </div>
                        <div class="discipline-card cad">
                            <img class="vector" src="{{ asset('images/2022/cad_ident.svg') }}" alt="">
                            <div class="caption">
                                Computer Aided Designers
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <section class="bg-red">
            <svg class="rip" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1920 59">
                <path
                    d="M0,0,81,59l37-41L228.56,59l26.66-29.5L280.11,59,367,20l12.67,39L524,16,769,52,949,18l44,41,12.44-29.5L1037,46l21.78-16.5L1091,44l195-26,263,30,79-36,55,38,118.89-20.5L1867.67,59,1920,0Z"/>
            </svg>

            @include('components/red-graphic')

            <div class="container">
                <div class="row">
                    <div class="col-md-4">
                        <div class="content">
                            <h2>Meet Our Students</h2>
                            <p>
                                The Transmedia Exhibition Lorem ipsum
                                dolor sit amet, consectetur adipiscing elit.
                                Nullam mattis risus id lectus feugiat, et
                                iaculis tellus mollis. Suspendisse vel orci
                                dictum, feugiat sapien sit amet, interdum
                                dolor. Maecenas nulla velit, pharetra at
                                urna sit amet, porta tempus sapien. Cras
                                varius, ipsum non dapibus posuere,
                                nisi nequ

                            </p>
                        </div>
                    </div>
                </div>
                <div class="row" x-data="studentSlider()">
                    @foreach($students as $key => $student)
                        <div x-show="slide == {{ floor($key / 4) }}"
                             x-transition:enter="scale-enter"
                             x-transition:enter-start="scale-enter-start"
                             x-transition:enter-end="scale-enter-end"
                             x-transition:leave="scale-leave"
                             x-transition:leave-start="scale-leave-start"
                             x-transition:leave-end="scale-leave-end"
                             class="col-sm-3">
                            <div class="discipline-card">
                                <img src="{{ $student->page->avatar_image->file_url }}" alt="">
                            </div>
                        </div>
                    @endforeach
                </div>

                <script>
                    function studentSlider() {
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
                                if (this.slide === {{ floor(count($students) / 4) - 1 }} ) {
                                    this.slide = 0;
                                } else {
                                    this.slide++;
                                }
                                this.resetInterval();
                            },
                            backward() {
                                this.slide = this.slide - (this.slide === 0 ? - {{ (count($students) / 4) - 1 }} : 1);
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

        </section>
        <section class="bg-gray lg-image-container">
            <div class="lg-image ken-burns-container">
                <img class="ken-burns" src="{{ asset('/images/west_downs_large.jpg') }}" alt="">
                <div class="caption">
                    <h3>
                        Thursday 12th May
                    </h3>
                    <p>
                        The University of, Romsey Rd, Winchester SO22 5FT
                    </p>
                </div>
            </div>
        </section>
        <section class="bg-gray">
            <div class="container">
                <div class="row">
                    <div class="col-md-8"></div>
                    <div class="col-md-4">
                        <div class="content">
                            <h2>{{ date('Y') }} Projects</h2>
                            <p>
                                The Transmedia Exhibition Lorem ipsum
                                dolor sit amet, consectetur adipiscing elit.
                                Nullam
                            </p>
                        </div>
                    </div>
                </div>
                <div class="row" x-data="projectSlider()">
                    @foreach($projects as $key => $project)
                        <div x-show="slide == {{ floor($key / 8) }}"
                             x-transition:enter="scale-enter"
                             x-transition:enter-start="scale-enter-start"
                             x-transition:enter-end="scale-enter-end"
                             x-transition:leave="scale-leave"
                             x-transition:leave-start="scale-leave-start"
                             x-transition:leave-end="scale-leave-end"
                             class="col-sm-3">
                            <div class="discipline-card">
                                <img src="{{ $project->thumbnail_media[0] }}" alt="">
                            </div>
                        </div>
                    @endforeach
                </div>

                <script>
                    function projectSlider() {
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
                                if (this.slide === {{ floor(count($projects) / 8) - 1 }} ) {
                                    this.slide = 0;
                                } else {
                                    this.slide++;
                                }
                                this.resetInterval();
                            },
                            backward() {
                                this.slide = this.slide - (this.slide === 0 ? - {{ (count($projects) / 8) - 1 }} : 1);
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
        </section>

    </main>


@endsection
