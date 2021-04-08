@extends('layouts.app')

@section('content')
    <div class="screen-block scroll-anchor">
        <div class="student-profile">
            <div class="banner">
                @if($user->page->banner_image)
                    <img src="{{ $user->page->banner_image->file_url }}" alt="{{ $user->name }} hero">
                @else
                    <img src="https://via.placeholder.com/1920x400" alt="{{ $user->name }} hero">
                @endif
            </div>
            <div class="avatar">

            </div>
        </div>
    </div>
@endsection
