@extends('layouts.app')

@section('content')
    <div id="app">
        <br><br>
        <div class="bg-gray">

            <div class="container">
                <div class="row">
                    <form class="col-md-4" action="{{ route('mypage.save') }}" method="post"
                          enctype="multipart/form-data">
                        @csrf
                        <input type="hidden" name="user_id" value="{{ $user->id }}">
                        <div class="student-banner">
                            <image-upload name="banner"
                                          label="Hero Banner"
                                          icon="las la-edit"
                                          @if($user->page->banner_image) insert="{{ $user->page->banner_image->file_url }}" @endif>
                            </image-upload>
                        </div>
                        <div class="student-avatar-container">
                            <div class="student-avatar">
                                <image-upload name="avatar"
                                              label="Avatar"
                                              icon="las la-user-edit"
                                              @if($user->page->avatar_image) insert="{{ $user->page->avatar_image->file_url }}" @endif>
                                </image-upload>
                            </div>
                        </div>
                        <div class="student-details">
                            <h1>
                                <input type="text" name="name" value="{{ $user->name }}" placeholder="Your Name">
                            </h1>
                            @error('name')
                            <p class="error">{{ $message }}</p>
                            @enderror
                            <h2>

                                <select name="course_id">
                                    @foreach($courses as $course)
                                        <option @if($course->id === $user->page->course_id)
                                                selected
                                                @endif value="{{ $course->id }}">
                                            @if($user->year === 1)
                                                First Year
                                            @elseif($user->year === 2)
                                                Second Year
                                            @elseif($user->year === 3)
                                                Third Year
                                            @elseif($user->year === 4)
                                                MA
                                            @endif
                                            {{ $course->name }}
                                        </option>
                                    @endforeach
                                </select>
                            </h2>
                            @error('course_id')
                            <p class="error">{{ $message }}</p>
                            @enderror
                            <strong>
                                <input type="text" name="tagline" value="{{ $user->page->tagline }}"
                                       placeholder="Tagline"/>
                            </strong>
                            @error('tagline')
                            <p class="error">{{ $message }}</p>
                            @enderror
                            <p class="my-2">
                                <textarea id="bio" name="bio" placeholder="A little bit about yourself..."
                                          maxlength="300" rows="4">{{ $user->page->bio }}</textarea>
                            </p>
                            @error('boi')
                            <p class="error">{{ $message }}</p>
                            @enderror
                            <div class="my-2">
                                <input name="portfolio_url" placeholder="Portfolio Url" type="text" class="url-input"
                                       value="{{ $user->page->portfolio_url }}">
                                @error('portfolio_url')
                                <p class="error">{{ $message }}</p>
                                @enderror
                            </div>
                            <div class="my-2">
                                <input name="instagram_url" placeholder="Instagram Url" type="text" class="url-input"
                                       value="{{ $user->page->instagram_url }}">
                                @error('instagram_url')
                                <p class="error">{{ $message }}</p>
                                @enderror
                            </div>

                        </div>

                        <button type="submit" class="btn btn-orange">
                            Save your page
                        </button>
                    </form>
                    <div class="col-md-8">
                        <div class="student-projects">
                            @foreach($user->projects as $key => $project)
                                <form id="{{ $project->id }}" method="post"
                                      action="{{ route('project.save', $project->id) }}"
                                      class="student-project"
                                      enctype="multipart/form-data">
                                    @csrf
                                    <div class="project-title-editor">
                                        <h2>
                                            <input type="text" name="title" value="{{ $project->title }}"
                                                   placeholder="Project Title">
                                        </h2>
                                          <div class="buttons">
                                            <a href="{{ route('project.delete', $project->id) }}"
                                               onclick="return confirm('Are you sure you want to delete this project?')"
                                               class="btn-delete">
                                                <i class="las la-trash"></i>
                                            </a>
                                            <button type="submit" class="btn-save">
                                                <i class="las la-save"></i>
                                            </button>
                                        </div>
                                    </div>


                                    <div class="project-image">
                                        <image-upload name="image"
                                                      label="Project Image"
                                                      icon="las la-edit"
                                                      @if($project->image) insert="{{ $project->image_url->file_url }}" @endif>
                                        </image-upload>
                                    </div>
                                    <div class="description">
                                                  <textarea id="bio" name="description"
                                                            placeholder="A little bit about the project..."
                                                            maxlength="500" rows="8">{{ $project->description }}
                                                </textarea>
                                    </div>
                                </form>
                            @endforeach
                            @if($user->projects->count() < 3)
                                <div>
                                    <a href="{{ route('project.create', $user->id) }}" class="btn btn-orange">
                                        Add a project
                                    </a>
                                </div>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
    <script src="{{ asset('/js/app.js') }}"></script>

@endsection


