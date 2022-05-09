@extends('layouts.app')

@section('content')
    <section class="bg-gray">
        <br><br>
        <div class="container">
            <div class="row">
                <div class="col-md-4">
                    <div class="student-banner ken-burns-container">
                        @if($project->thumbnail_media[0])
                            <img class="ken-burns" src="{{ $project->thumbnail_media[0] }}"
                                 alt="{{ $project->thumbnail_media[0] }} banner">
                        @else
                            <img src="{{ asset('/images/banner_default.jpg?v='.date('d-m-Y')) }}"
                                 alt="{{ $project->title }} banner">
                        @endif
                    </div>
                    <div class="student-details">
                        <h1>
                            {{ $project->title }}
                        </h1>

                        <p>
                            {!! $project->description !!}
                        </p>
                    </div>
                </div>
                <div class="col-md-8">
                    <div class="student-projects" style="overflow-y: hidden">
                        <div class="student-project">
                            <div class="project-image">
                                <iframe width="100%" height="100%"
                                        src="https://www.youtube.com/embed/{{ $project->video_id }}" frameborder="0"
                                        allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"
                                        allowfullscreen></iframe>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="bg-red">
        @include('components/top-rip')
        @include('components/red-graphic')

        <div class="container">
            <div class="row">
                <div class="col-md-5">
                    <div class="content">
                        <h2>The Students</h2>
                        <p>
                            These are the students that created this project, click on each to see more of their work!
                        </p>
                        <a class="btn btn-primary" href="{{ url('/students') }}">
                            Meet all of the DMD Students
                        </a>
                    </div>
                </div>
            </div>
            <div class="row" x-data="studentSlider()">
                @foreach($project->user as $key => $student)
                    <div x-show="slide == {{ floor($key / 4) }}"
                         x-transition:enter="scale-enter"
                         x-transition:enter-start="scale-enter-start"
                         x-transition:enter-end="scale-enter-end"
                         x-transition:leave="scale-leave"
                         x-transition:leave-start="scale-leave-start"
                         x-transition:leave-end="scale-leave-end"
                         class="col-sm-3">

                        <a href="{{ url('/students/'.$student->slug) }}" class="discipline-card">
                            @if($student->page->avatar_image)
                            <img src="{{ $student->page->avatar_image->file_url }}" alt="{{ $student->name }}">
                            @else
                                <img src="{{ asset('/images/avatar_default.jpg?v='.date('d-m-Y')) }}"
                                     alt="{{ $student->name }} avatar">
                            @endif
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
                            if (this.slide === {{ floor((count($project->user) - 1) / 4) }}) {
                                this.slide = 0;
                            } else {
                                this.slide++;
                            }
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
