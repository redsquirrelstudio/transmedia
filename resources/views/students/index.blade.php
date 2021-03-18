@extends('layouts.app')

@section('content')
    <div class="top">
        <div class="heading">
            <img src="{{ asset('/img/logo.svg') }}" alt="">
            <h2>Our Students</h2>
            <p>Meet the DMD course's many students specialising in various <br> areas of Design, Development, CAD and 3D.
            </p>
            <nav class="year-nav">
                <a href="{{ url('/students') }}" class="is-active">
                    All
                </a>
                <a href="{{ url('/students/year/1') }}">
                    Year 1
                </a>
                <a href="{{ url('/students/year/2') }}">
                    Year 2
                </a>
                <a href="{{ url('/students/year/3') }}">
                    Year 3
                </a>
                <a href="{{ url('/students/year/4') }}">
                    MA
                </a>
            </nav>
        </div>
    </div>
@endsection
