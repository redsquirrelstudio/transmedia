@extends('layouts.app')

@section('content')
    <section class="bg-red">
        @include('components/bottom-rip')
        <div class="container content">
            <div class="row">
                <div class="col-md-12">
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
            <div class="row">
                @foreach($course->page()->whereHas('avatar_image')->get() as $key => $page)
                    @if($page->user->year === $year)
                        <div class="col-sm-3">
                            <a href="{{ url('/students/'.$page->user->slug) }}" class="discipline-card">
                                <img src="{{ $page->avatar_image->file_url }}" alt="{{ $page->user->name }}">
                            </a>
                        </div>
                    @endif

                @endforeach
            </div>
        </div>
    </section>
@endsection
