@extends('layouts.app')

@section('content')

    <section class="bg-red">
        <div class="container content">
            <div class="row">
                <div class="col-md-5">
                    <div class="content">
                        <h2>{{ date('Y') }} Projects</h2>
                        <p>
                            We're proud to present a set of projects that really caught our eye this year.
                            Below are some examples of our students work that you'll definitely want to see.
                            You can find out more details about each by clicking through to their pages or simply
                            attending the exhibition on 12/05/2022 to ask the students yourself!
                            <br><br>
                            This is by no means all of the amazing work that our students have created and you can
                            find more on their individual pages.
                            <br>
                            <a href="{{ url('/students') }}" class="btn btn-primary">
                                Meet the students
                            </a>
                        </p>
                    </div>
                </div>
            </div>
            <div class="row mt-6">
                @foreach($projects as $project)
                    <div class="col-md-3">
                        <a href="{{ route('projects.single', $project->id) }}" class="discipline-card">
                            <img src="{{ $project->thumbnail_media[0] ?? asset('/images/avatar_default.jpg') }}"
                                 alt="{{ $project->title }} thumbnail">
                        </a>
                    </div>
                @endforeach
            </div>
        </div>
        @include('components/red-graphic')
        @include('components/bottom-rip')
    </section>
@endsection
