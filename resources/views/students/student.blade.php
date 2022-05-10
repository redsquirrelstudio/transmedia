@extends('layouts.app')

@section('content')
    <div id="app">
        <br><br>
        <div class="bg-gray">
            <div class="container">
                <div class="row">
                    <div class="col-md-4">
                        <div class="student-banner ken-burns-container">
                            @if($student->page->banner_image)
                                <img class="ken-burns" v-lazy="'{{ $student->page->banner_image->file_url }}'"
                                     alt="{{ $student->name }} banner"
                                     error="{{ asset('/images/banner_default.jpg?v='.date('d-m-Y')) }}">
                            @else
                                <img src="{{ asset('/images/banner_default.jpg?v='.date('d-m-Y')) }}" alt="{{ $student->name }} banner">
                            @endif
                        </div>
                        <div class="student-avatar-container">
                            <div class="student-avatar">
                                @if($student->page->avatar_image)
                                    <img v-lazy="'{{ $student->page->avatar_image->file_url }}'"
                                         alt="{{ $student->name }} avatar">
                                @else
                                    <img src="{{ asset('/images/avatar_default.jpg?v='.date('d-m-Y')) }}"
                                         alt="{{ $student->name }} avatar">
                                @endif
                            </div>
                        </div>
                        <div class="student-details">
                            <h1 data-aos="fade-right">
                                {{ $student->name }}
                            </h1>
                            <h2 data-aos="fade-right" data-aos-delay="100">
                                @if($student->year === 1)
                                    First Year
                                @elseif($student->year === 2)
                                    Second Year
                                @elseif($student->year === 3)
                                    Third Year
                                @elseif($student->year === 4)
                                    MA
                                @endif
                                @if($student->page->course_id)
                                    {{ $student->page->course->name }}
                                @endif
                            </h2>
                            <strong data-aos="fade-right" data-aos-delay="200">
                                {{ $student->page->tagline }}
                            </strong>
                            <p data-aos="fade-right" data-aos-delay="300">
                                {{ $student->page->bio }}
                            </p>

                            <div class="student-links">
                                <a href="mailto:{{ $student->email }}">
                                    <i class="las la-envelope"></i>
                                </a>
                                @if($student->page->instagram_url)
                                    <a target="_blank" href="{{ $student->page->instagram_url }}">
                                        <i class="lab la-instagram"></i>
                                    </a>
                                @endif
                                @if($student->page->portfolio_url)
                                    <a target="_blank" href="{{ route('students.portfolio', $student->id) }}">
                                        <i class="las la-laptop"></i>
                                    </a>
                                @endif
                            </div>

                        </div>
                    </div>
                    <div class="col-md-8">
                        <div class="student-projects">
                            @foreach($student->projects as $key => $project)
                                <div id="{{ $project->id }}" class="student-project">
                                    <h2>
                                        {{ $project->title }}
                                    </h2>
                                    @if($project->image)
                                        <div class="project-image">
                                            <img src="{{ $project->image_url->file_url }}" alt="{{ $project->title }}">
                                        </div>
                                    @endif
                                    @if($project->description)
                                        <div class="description">
                                            {{ $project->description }}
                                        </div>
                                    @endif
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
    <script src="{{ asset('/js/app.js') }}"></script>

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
                            <img src="{{ $student->page->avatar_image->file_url }}" alt="{{ $student->name }}">
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
                            this.slide = this.slide - (this.slide === 0 ? -{{ (count($students) - 1 / 4) }} : 1);
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

@endsection
