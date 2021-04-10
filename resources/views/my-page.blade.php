@extends('layouts.app')

@section('content')
    <form action="{{ route('mypage.save') }}" method="post" class="screen-block"
          enctype="multipart/form-data">
        @csrf
        <input name="user_id" type="hidden" value="{{ $user->id }}">
        <div class="student-profile">
            <div class="banner">
                <image-upload name="banner"
                              label="Hero Banner"
                              icon="las la-edit"
                              @if($user->page->banner_image) insert="{{ $user->page->banner_image->file_url }}" @endif>
                </image-upload>
            </div>

            <div class="profile-details">
                <div class="avatar">
                    <image-upload name="avatar"
                                  label="Avatar"
                                  icon="las la-user-edit"
                                  @if($user->page->avatar_image) insert="{{ $user->page->avatar_image->file_url }}" @endif>
                    </image-upload>
                </div>
                <div class="details">
                    <h2>
                        <input type="text" name="name" value="{{ $user->name }}" placeholder="Your Name">
                    </h2>
                    @error('name')
                    <p class="error">{{ $message }}</p>
                    @enderror
                    <h4>
                        @if($user->year === 1)
                            1st Year
                        @elseif($user->year === 2)
                            2nd Year
                        @elseif($user->year === 3)
                            3rd Year
                        @elseif($user->year === 4)
                            MA
                        @endif
                        <select name="course_id">
                            @foreach($courses as $course)
                                <option @if($course->id === $user->page->course_id)
                                        selected
                                        @endif value="{{ $course->id }}">
                                    {{ $course->name }}
                                </option>
                            @endforeach
                        </select>
                        <input type="text" name="tagline" value="{{ $user->page->tagline }}" placeholder="Tagline"/>
                    </h4>
                </div>
            </div>
            <div class="profile-projects">
                <div class="projects">
                    @foreach($user->projects as $project)
                        @if($project->image)
                            <a href="#{{ $project->id }}" class="project-thumbnail">
                                <img src="{{ $project->image_url->file_url }}" alt="{{ $project->title }}">
                            </a>
                        @endif
                    @endforeach
                </div>
                <div class="bio">
                    <textarea id="bio" name="bio" placeholder="A little bit about yourself..." maxlength="300"
                              rows="4">{{ $user->page->bio }}
                    </textarea>
                    <input name="portfolio_url" placeholder="Portfolio Url" type="text" class="url-input"
                           value="{{ $user->page->portfolio_url }}">
                    @error('portfolio_url')
                    <p class="error">{{ $message }}</p>
                    @enderror
                    <input name="instagram_url" placeholder="Instagram Url" type="text" class="url-input"
                           value="{{ $user->page->instagram_url }}">
                    @error('instagram_url')
                    <p class="error">{{ $message }}</p>
                    @enderror
                </div>
            </div>
        </div>
        <button type="submit" class="btn-save">
            <i class="las la-save"></i>
        </button>
    </form>
    @foreach($user->projects as $key => $project)
        <form id="{{ $project->id }}" method="post" action="{{ route('project.save', $project->id) }}"
              class="project-block"
              enctype="multipart/form-data">
            @csrf
            <h2>
                <input type="text" name="title" value="{{ $project->title }}" placeholder="Project Title">
            </h2>
            <div class="project-content @if($key === 1) flipped @endif">
                <div class="project-image">
                    <image-upload name="image"
                                  label="Project Image"
                                  icon="las la-edit"
                                  @if($project->image) insert="{{ $project->image_url->file_url }}" @endif>
                    </image-upload>
                </div>
                <div class="description">
                      <textarea id="bio" name="description" placeholder="A little bit about the project..."
                                maxlength="500" rows="8">{{ $project->description }}
                    </textarea>
                </div>
            </div>
            <a href="{{ route('project.delete', $project->id) }}"
               onclick="return confirm('Are you sure you want to delete this project?')" class="btn-delete">
                <i class="las la-trash"></i>
            </a>
            <button type="submit" class="btn-save">
                <i class="las la-save"></i>
            </button>
        </form>
    @endforeach

    @if($user->projects->count() < 3)
        <div class="project-add-button">
            <a href="{{ route('project.create', $user->id) }}" class="btn-c2a">Create Project</a>
        </div>
    @endif
@endsection
