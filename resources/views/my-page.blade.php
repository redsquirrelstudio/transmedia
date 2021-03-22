@extends('layouts.app')

@section('content')
    <div class="profile">
        <div class="hero-image">
            <img src="https://via.placeholder.com/1920x400" alt="{{ auth()->user()->name }} hero">
        </div>
        <div class="profile-main">
            <div class="profile-card">
                <div class="avatar">
                    <img src="https://via.placeholder.com/300" alt="{{ auth()->user()->name }}">
                </div>
                <div class="profile-details">
                    <h2>
                        {{ auth()->user()->name }}
                        @if(!auth()->user()->verified)
                            <small>(Unverified - Unable to edit page)</small>
                        @endif
                    </h2>
                    <h4>
                        @if(auth()->user()->year === 1)
                            1st Year
                        @elseif(auth()->user()->year === 2)
                            2nd Year
                        @elseif(auth()->user()->year === 3)
                            3rd Year
                        @else
                            MA
                        @endif
                        {{ auth()->user()->getCourse()->name }}
                    </h4>
                    <strong>
                        {{ auth()->user()->page->tagline }}
                    </strong>
                    <p>
                        {{ auth()->user()->page->bio }}
                    </p>
                </div>
                @if(auth()->user()->page->portfolio_url)
                    <div class="visit-overlay">
                        <a href="{{ auth()->user()->page->portfolio_url }}" target="_blank" class="visit-text">
                            <i class="las la-external-link-alt"></i>
                            <h2>
                                Visit {{ explode(' ', auth()->user()->name)[0] }}{{ explode(' ', auth()->user()->name)[0][strlen(explode(' ', auth()->user()->name)[0]) - 1] === 's' ? "'" : "'s"}}
                                Portfolio</h2>
                            <small>{{ parse_url(auth()->user()->page->portfolio_url)['host'] }}</small>
                        </a>
                    </div>
                @endif
            </div>
        </div>


    </div>

    @if(auth()->user()->verified)
        <div class="edit-button" @click.prevent="showEditor = true">
            <i class="las la-pen"></i>
        </div>
    @endif

    <transition name="slide-left">
        <page-editor v-if="showEditor" @close="showEditor = false" api-url="{{ route('my_page.save') }}"
                     :user="{{ auth()->user()->with('page')->first() }}" :courses="{{ $courses }}"></page-editor>
    </transition>
@endsection
