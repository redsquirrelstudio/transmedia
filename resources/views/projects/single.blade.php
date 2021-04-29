@extends('layouts.app')

@section('content')
    <div class="screen-block">
        <div class="student-profile">
            <div class="banner">
                @if($project->banner_media)
                    <img src="{{ $project->banner_media }}" alt="{{ $project->title }} hero">
                @else
                    <img src="{{ asset('/images/banner_default.jpg') }}" alt="{{ $project->title }} hero">
                @endif
            </div>
            <div class="profile-details">
                <thumbnail-slider :slides="{{ json_encode($project->thumbnail_media) }}"></thumbnail-slider>
                <div class="details">
                    <h2>
                        {{ $project->title }}
                    </h2>
                    <h4>
                        @foreach($project->user as $key => $student)
                            <a href="{{ route('students.student', $student->id) }}">{{ $student->name }}{{ $key < $project->user()->count() - 1 ? ',' : '' }}</a>
                        @endforeach
                    </h4>
                    <p>
                        {!! $project->description !!}
                    </p>
                </div>
            </div>
        </div>
        <div class="screen-block">
            <div class="students-header">
                <h4>{{ $project->title }}</h4>
                <h2>The Students</h2>
                <div class="block-links">
                    @foreach($project->user as $key => $student)
                        <a href="{{ route('students.student', $student->id) }}" class="block-link">
                            @if($student->page->avatar_image)
                                <img v-lazy="'{{ $student->page->avatar_image->file_url }}'" alt="{{ $student->name }} avatar">
                            @else
                                <img src="{{ asset('/images/avatar_default.jpg') }}" alt="{{ $student->name }} avatar">
                            @endif
                            <div class="overlay">
                                {{ $student->name }}
                            </div>
                        </a>
                    @endforeach
                </div>
            </div>
        </div>
@endsection
