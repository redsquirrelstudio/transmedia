@extends('layouts.app')

@section('content')

    <main class="home-page">
        @include('components/hero-slider')

        <section class="bg-gray">
            <div class="container">
                <div class="row">
                    <div class="col-md-3">
                        <div data-aos="fade-up" class="discipline-card large">
                            <img src="{{ asset('/images/west_downs_birdseye.jpg') }}" alt="West Downs">
                        </div>
                        <div data-aos="fade-up" data-aos-delay="100" class="discipline-card-caption">
                            <h2>
                                12/05/2022
                            </h2>
                            <p>
                                In our annual Transmedia & Pitch your project event, we would like to
                                share the work of our students from the DMD, 3D, Game & CAD undergraduate
                                programmes, and the MA Digital Media Practice and Pathways' students.
                            </p>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <a data-aos="fade-up" data-aos-delay="100" href="{{ url('/students#designers') }}" class="discipline-card design">
                            <img class="vector" src="{{ asset('images/2022/designer_ident.svg') }}" alt="">
                            <div class="caption">
                                Designers
                            </div>
                        </a>
                        <a data-aos="fade-up" data-aos-delay="400" href="{{ url('/students#3d-environments-developers') }}"
                           class="discipline-card three-d">
                            <img class="vector" src="{{ asset('images/2022/3d_dev_ident.svg') }}" alt="">
                            <div class="caption">
                                3D Environments Developers
                            </div>
                        </a>
                    </div>
                    <div class="col-md-3">
                        <a data-aos="fade-up" data-aos-delay="200" href="{{ url('/students#developers') }}"
                           class="discipline-card development">
                            <img class="vector" src="{{ asset('images/2022/dev_ident.svg') }}" alt="">
                            <div class="caption">
                                Developers
                            </div>
                        </a>
                        <a data-aos="fade-up" data-aos-delay="500" href="{{ url('/students#3d-visualisation-artists') }}"
                           class="discipline-card three-d-vis">
                            <img class="vector" src="{{ asset('images/2022/3d_vis_ident.svg') }}" alt="">
                            <div class="caption">
                                3D Visualisation <br>Artists
                            </div>
                        </a>
                    </div>
                    <div class="col-md-3">
                        <a data-aos="fade-up" data-aos-delay="300" href="{{ url('/students#games-designers') }}"
                           class="discipline-card game-design">
                            <img class="vector" src="{{ asset('images/2022/game_design_ident.svg') }}" alt="">
                            <div class="caption">
                                Game Designers
                            </div>
                        </a>
                        <a data-aos="fade-up" data-aos-delay="600" href="{{ url('/students#cad') }}" class="discipline-card cad">
                            <img class="vector" src="{{ asset('images/2022/cad_ident.svg') }}" alt="">
                            <div class="caption">
                                Computer Aided Designers
                            </div>
                        </a>
                    </div>
                </div>
            </div>
        </section>

        <section class="bg-red">
            @include('components/top-rip')

            @include('components/red-graphic')

            <div class="container">
                <div class="row">
                    <div class="col-md-4">
                        <div class="content">
                            <h2 data-aos="fade-right">Meet Our Students</h2>
                            <p data-aos="fade-right" data-aos-delay="100">
                                Our talented students have a wide variety of skill sets which they use to create some
                                amazing pieces of work.
                                This wide diversity allows for students to work in a work-place like environment so that
                                they can develop their
                                team working skills.
                            </p>
                            <a data-aos="fade-right" data-aos-delay="200" class="btn btn-primary" href="{{ url('/students') }}">
                                Meet them All
                            </a>
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
                            <a href="{{ url('/students/'.$student->slug) }}" class="discipline-card">
                                <img src="{{ $student->page->avatar_image->file_url }}" alt="">
                            </a>
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
                                if (this.slide === {{ floor(count($students) / 4) - 1 }}) {
                                    this.slide = 0;
                                } else {
                                    this.slide++;
                                }
                                this.resetInterval();
                            },
                            backward() {
                                this.slide = this.slide - (this.slide === 0 ? -{{ (count($students) / 4) - 1 }} : 1);
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
            @include('components/bottom-rip')
        </section>
        <section class="bg-gray">
            <div class="container">
                <div class="row">
                    <div class="col-md-8"></div>
                    <div class="col-md-4">
                        <div class="content">
                            <h2 data-aos="fade-left">{{ date('Y') }} Projects</h2>
                            <p data-aos="fade-left" data-aos-delay="100">
                                We're proud to present {{ date('Y') }}'s featured projects.
                                A set of work that has really stood out and we know you'll want to see.
                            </p>
                        </div>
                    </div>
                </div>
                <div class="row">
                    @foreach($projects as $key => $project)
                        <div class="col-sm-3" data-aos="fade-up" data-aos-delay="{{ $key * 100 }}">
                            <a href="{{ url('/projects/'.$project->id) }}" class="discipline-card">
                                <img src="{{ $project->thumbnail_media[0] ?? asset('/images/banner_default.jpg') }}"
                                     alt="{{ $project->title }}">
                            </a>
                        </div>
                    @endforeach
                </div>
            </div>
        </section>

    </main>


@endsection
