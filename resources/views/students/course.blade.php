@extends('layouts.app')

@section('content')
    <div class="top">
        <div class="heading">
            <img src="{{ asset('/img/logo.svg') }}" alt="">
            <h2>Our Students</h2>
            <p>Meet the DMD course's many students specialising in various <br> areas of Design, Development, CAD and 3D.
            </p>
            <nav class="year-nav">
                <a href="{{ url('/students') }}">
                    All
                </a>
                <a href="{{ url('/students/year/1') }}" @if($year === 1) class="is-active" @endif>
                    Year 1
                </a>
                <a href="{{ url('/students/year/2') }}" @if($year === 2) class="is-active" @endif>
                    Year 2
                </a>
                <a href="{{ url('/students/year/3') }}" @if($year === 3) class="is-active" @endif>
                    Year 3
                </a>
                <a href="{{ url('/students/year/4') }}" @if($year === 4) class="is-active" @endif>
                    MA
                </a>
            </nav>
            <nav class="course-nav">
                <a href="{{ url('/students/year/'.$year) }}">
                    All
                </a>
                @foreach($courses as $course)
                    <a href="{{ url('/students/year/'.$year.'/course/'.$course->slug) }}" @if($course_slug === $course->slug) class="is-active" @endif>
                        {{ $course->plural }}
                    </a>
                @endforeach
            </nav>
        </div>
    </div>
@endsection
