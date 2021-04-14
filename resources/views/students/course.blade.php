@extends('layouts.app')

@section('content')
    <div class="screen-block">
        <div class="students-header">
            <img src="{{ asset('/images/wave_top.svg') }}" class="wave-top"/>
            <h4><a href="{{ route('students.index') }}"><i class="las la-angle-double-left"></i> Back To All
                    Students</a> | Digital Media Department</h4>
            <h2>
                Meet Our
                @isset($year)
                    @if($year === 1)
                        1st Year
                    @elseif($year === 2)
                        2nd Year
                    @elseif($year === 3)
                        Third Year
                    @elseif($year === 4)
                        MA
                    @endif
                @endisset
                {{ $course->plural }}
            </h2>
            <div class="block-links">
                @foreach($course->page()->inRandomOrder()->get() as $page)
                    @if(!isset($year) || $page->user->year === $year)
                        <a href="{{ route('students.student', $page->user->id) }}" class="block-link">
                            <img src="{{ $page->avatar_image->file_url ?? asset('/images/avatar_default.jpg') }}"
                                 alt="">
                            <div class="overlay">
                                {{ $page->user->name }}
                            </div>
                        </a>
                    @endif
                @endforeach
            </div>
        </div>
    </div>

    </div>
@endsection
