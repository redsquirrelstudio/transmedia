@extends('layouts.app')

@section('content')
    <section class="bg-red">
        @include('components/bottom-rip')
        <div class="container">
            <div class="content">
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
                <a href="{{ url('/students') }}" class="btn btn-primary">
                    Back to all students
                </a>
            </div>
        </div>
    </section>
@endsection
