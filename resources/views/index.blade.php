@extends('layouts.app')

@section('content')
    <hero-slider :slides="[
    {
        id: 1,
        title: 'Virtual Exhibition',
        subtitle: 'Our Hall Of Fame',
        link_text: 'Get Started',
        link_href: '/',
        src: '{{ asset('/video/transmedia_virtual_expo.mp4') }}',
        type: 'video',
    },
    {
        id: 2,
        title: 'Virtual Exhibition',
        subtitle: 'Our Hall Of Fame',
        link_text: 'Get Started',
        link_href: '/',
        src: 'https://source.unsplash.com/random',
        type: 'image',
    },
    {
        id: 3,
        title: 'Virtual Exhibition',
        subtitle: 'Our Hall Of Fame',
        link_text: 'Get Started',
        link_href: '/',
        src: 'https://source.unsplash.com/random',
        type: 'image',
    }
    ]"></hero-slider>
    <div class="screen-block">
        <div class="welcome-block scroll-anchor">
            <div class="video-block">
                <video autoplay muted loop>
                    <source src="{{ asset('/video/transmedia_square.mp4') }}" type="video/mp4">
                </video>
            </div>
            <div class="welcome-message">
                <hr>
                <div class="indent">
                    <h2>
                        Hi there!
                    </h2>
                    <p>
                        We are Digital Media Students, proudly presenting <br>
                        our annual end of the year show. <br><br>
                        Covid stopped the world but not us :) <br>
                        We produced work, both individual modules and
                        client projects. <br><br>
                        Please take a look and get in touch!
                    </p>
                    <a href="" class="btn-c2a">
                        Find Out More
                    </a>
                </div>
            </div>
        </div>
    </div>
    <div class="screen-block">
        <div class="live-block scroll-anchor tinted">
            <img src="https://images.unsplash.com/photo-1505373877841-8d25f7d46678?ixlib=rb-1.2.1&ixid=MXwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHw%3D&auto=format&fit=crop&w=1300&q=80" alt="">
            <div class="caption">
                <h1>We are with you live</h1>
                <h2>Thursday 06.05.2021</h2>
                <a href="" class="btn-c2a">
                    Find Out More
                </a>
            </div>
        </div>
    </div>
@endsection
