@extends('layouts.app')

@section('content')
    <div class="bg-red">
        <div class="container">
            <div class="row">
                <div class="col-md-6">
                    <div class="content">
                        <h2>
                            <strong>
                                Pitch your project.
                            </strong> <br>
                            <span class="font-normal">
                                Take a look at the presentation schedule for
                                the day.
                            </span>
                        </h2>
                        <div class="spacer"></div>
                        <p class="lead">
                            The pitch your project event is an opportunity for our third year students to present their
                            creative business plan to a panel of judges. You'll be able to watch each presentation and
                            how they
                            plan on creating, marketing, and distributing their proposed product or service. It's an
                            event that will
                            be running throughout the day so at any time you can drop in and see a creative idea.
                        </p>
                    </div>
                </div>
                <div class="col-md-1"></div>
                <div class="col-md-5">
                    <img
                        class="bd-placeholder-img bd-placeholder-img-lg featurette-image img-fluid mx-auto roundedimg aboutheadimg"
                        width="500" height="500" src="{{ asset('images/library.jpg')}}" alt="aboutheadimg">
                </div>
            </div>
        </div>
        @include('components/bottom-rip')
    </div>
    <div class="bg-gray">
        <div class="container">
            <div class="row col-md-7">
                <div class="col-md-7">

                </div>
                <h1>The Timings.</h1>
                <p class="lead">
                    Be sure not to miss the student you want to see! Each third year has a designated time slot in which
                    they'll
                    be presenting their idea, so plan accordingly!
                </p>
            </div>
            <div class="row mt-6">
                <div class="col-md-12">
                    <table style="width:100%">
                        <thead>
                            <tr>
                                <th class="colorcol roundtop">Student</th>
                                <th class="colorcol">Time</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($schedule as $key => $slot)
                                <tr>
                                    <td class="{{ $key % 2 ? 'colorcol' : 'midtablecol' }}">
                                        {{ $slot->description }}
                                    </td>
                                    <td class="{{ $key % 2 ? 'colorcol' : 'midtablecol' }}">
                                        {{ $slot->formatted_date }}
                                    </td>
                                </tr>
                            @endforeach

                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <section class="bg-red">
        @include('components/top-rip')
        @include('components/red-graphic')

        <div class="container">
            <div class="row">
                <div class="col-md-5">
                    <div class="content">
                        <h2>The Students</h2>
                        <p>
                            Familiarise yourself with these faces, you'll recognise them up on the stage as they present their final projects.
                            Click below to view each of their pages and see what they've been up to this year.
                        </p>
                        <a class="btn btn-primary" href="{{ url('/students') }}">
                            Meet all of the DMD Students
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
@endsection
