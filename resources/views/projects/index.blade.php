@extends('layouts.app')

@section('content')
    <hero-slider :slides="{{ json_encode($slides) }}"></hero-slider>
    <div class="screen-block">
        <div class="students-header">
            <h4>
                Digital Media Design, Development, 3D and CAD
            </h4>
            <h2>
                2021 Projects
            </h2>
            <div class="block-links">
                @foreach($projects as $project)
                    <a href="{{ route('projects.single', $project->id) }}" class="block-link">
                        <img v-lazy="'{{ $project->thumbnail_media[0] ?? asset('/images/avatar_default.jpg') }}'"
                             alt="{{ $project->title }} thumbnail">
                        <div class="overlay">
                            {{ $project->title }}
                        </div>
                    </a>
                @endforeach
            </div>
        </div>
    </div>
@endsection
