@extends('layouts.app')

@section('content')
    <div class="screen-block scroll-anchor">
        <div class="student-profile">
            <div class="banner">
                @if($student->page->banner_image)
                    <img src="{{ $student->page->banner_image->file_url }}" alt="{{ $student->name }} hero">
                @else
                    <img src="https://via.placeholder.com/1920x400" alt="{{ $student->name }} hero">
                @endif
            </div>
            <div class="profile-details">
                <div class="avatar">
                    <img src="{{ $student->page->avatar_image->file_url }}" alt="">
                </div>
                <div class="details">
                    <h2>
                        {{ $student->name }}
                    </h2>
                    <h4>
                        @if($student->year === 1)
                            1st Year
                        @elseif($student->year === 2)
                            2nd Year
                        @elseif($student->year === 3)
                            3rd Year
                        @elseif($student->year === 4)
                            MA
                        @endif
                        {{ $student->page->course->name }}; <br>
                        {{ $student->page->tagline }}
                    </h4>
                </div>
            </div>
            <div class="profile-projects">
                <div class="projects">
                    @foreach($student->projects as $project)
                        @if($project->image)
                            <a href="#{{ $project->id }}" class="project-thumbnail">
                                <img src="{{ $project->image_url->file_url }}" alt="{{ $project->title }}">
                            </a>
                        @endif
                    @endforeach
                </div>
                <div class="bio">
                    {{ $student->page->bio }}
                </div>
            </div>
            <div class="socials">
                <a href="mailto:{{ $student->email }}">
                    <hover-icon open-class="las la-envelope-open" close-class="las la-envelope"></hover-icon>
                </a>
                @if($student->page->instagram_url)
                    <a target="_blank"  href="{{ $student->page->instagram_url }}">
                        <hover-icon open-class="las la-caret-square-right" close-class="lab la-instagram"></hover-icon>
                    </a>
                @endif
                @if($student->page->portfolio_url)
                    <a target="_blank" href="{{ $student->page->portfolio_url }}">
                        <hover-icon open-class="las la-laptop-code" close-class="las la-laptop"></hover-icon>
                    </a>
                @endif
            </div>
        </div>
    </div>
    @foreach($student->projects as $key => $project)
        <div id="{{ $project->id }}" class="project-block scroll-anchor">
            <h2>
                {{ $project->title }}
            </h2>
            <div class="project-content @if($key === 1) flipped @endif">
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
        </div>
    @endforeach
@endsection
