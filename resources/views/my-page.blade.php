@extends('layouts.app')

@section('content')
    <div class="profile">
        <div class="hero-image">
            @if($user->page->banner_image)
                <img src="{{ $user->page->banner_image->file_url }}" alt="{{ $user->name }} hero">
            @else
                <img src="https://via.placeholder.com/1920x400" alt="{{ $user->name }} hero">
            @endif
        </div>
        <div class="profile-main">
            <div class="profile-card">
                <div class="avatar">
                    @if($user->page->avatar_image)
                        <img src="{{ $user->page->avatar_image->file_url }}" alt="{{ $user->name }}">
                    @else
                        <img src="https://via.placeholder.com/300" alt="{{ $user->name }}">
                    @endif
                </div>
                <div class="profile-details">
                    <h2>
                        {{ $user->name }}
                        @if(!$user->verified)
                            <small>(Unverified - Unable to edit page)</small>
                        @endif
                    </h2>
                    <h4>
                        @if($user->year === 1)
                            1st Year
                        @elseif($user->year === 2)
                            2nd Year
                        @elseif($user->year === 3)
                            3rd Year
                        @else
                            MA
                        @endif
                        @if($user->getCourse())
                            {{ $user->getCourse()->name }}
                        @endif
                    </h4>
                    <strong>
                        {{ $user->page->tagline }}
                    </strong>
                    <p>
                        {{ $user->page->bio }}
                    </p>
                </div>
                @if($user->page->portfolio_url)
                    <a href="{{ $user->page->portfolio_url }}" target="_blank" class="visit-overlay">
                        <div class="visit-text">
                            <i class="las la-external-link-alt"></i>
                            <h2>
                                Visit {{ explode(' ', $user->name)[0] }}{{ explode(' ', $user->name)[0][strlen(explode(' ', $user->name)[0]) - 1] === 's' ? "'" : "'s"}}
                                Portfolio</h2>
                            <small>{{ parse_url($user->page->portfolio_url)['host'] }}</small>
                        </div>
                    </a>
                @endif
            </div>
        </div>


    </div>

    @if($user->verified)
        <div class="edit-button" @click.prevent="showEditor = true">
            <i class="las la-pen"></i>
        </div>
    @endif

    <transition name="slide-left">
        <page-editor v-if="showEditor" @close="showEditor = false" api-url="{{ route('my_page.save') }}"
                     upload-url="{{ url('/') }}"
                     :user="{{ $user }}" :courses="{{ $courses }}"></page-editor>
    </transition>
@endsection
