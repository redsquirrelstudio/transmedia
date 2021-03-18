@extends('layouts.app')

@section('content')
    <div class="profile">
        <div class="hero-image">
            <img src="https://via.placeholder.com/1920x400" alt="{{ auth()->user()->name }} hero">
            <div class="avatar">
                <img src="https://via.placeholder.com/300" alt="{{ auth()->user()->name }}">
            </div>
        </div>
        <div class="profile-details">
            <h2>
                {{ auth()->user()->name }} @if(!auth()->user()->verified) <small>(Unverified - Unable to edit
                    page)</small> @endif
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
            </h4>
        </div>
    </div>

    @if(auth()->user()->verified)
        <div class="edit-button" @click.prevent="showEditor = true">
            <i class="las la-pen"></i>
        </div>
    @endif

    <transition name="slide-left">
        <page-editor v-if="showEditor" @close="showEditor = false"
                    :user="{{ auth()->user()->with('page')->first() }}" :courses="{{ $courses }}"></page-editor>
    </transition>
@endsection
