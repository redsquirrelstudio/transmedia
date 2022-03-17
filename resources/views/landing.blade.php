<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Transmedia 2022</title>
    <link rel="stylesheet" href="{{ asset('/css/app.css') }}">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@300;400;500;600;700;800&display=swap"
          rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">

    <link rel="apple-touch-icon" sizes="180x180" href="{{ asset('/icons//apple-touch-icon.png') }}">
    <link rel="icon" type="image/png" sizes="32x32" href="{{ asset('/icons//favicon-32x32.png') }}">
    <link rel="icon" type="image/png" sizes="16x16" href="{{ asset('/icons//favicon-16x16.png') }}">
    <link rel="manifest" href="{{ asset('/icons//site.webmanifest') }}">
    <link rel="mask-icon" href="{{ asset('/icons//safari-pinned-tab.svg') }}" color="#5bbad5">
    <meta name="msapplication-TileColor" content="#9f00a7">
    <meta name="theme-color" content="#ffffff">
</head>
<body>

<main class="landing-page">
{{--    @include('components/landing/video')--}}

    <div class="graphic-left">
        @include('components/landing/left-graphic')
    </div>
    <div class="graphic-right">
        @include('components/landing/right-graphic')
    </div>

    @php
        $days_remaining = \Carbon\Carbon::now()->diffInDays(\Carbon\Carbon::parse('12-05-2022'));
        if ($days_remaining < 10){
            $days_remaining = '0'.$days_remaining;
        }
        else{
            $days_remaining = (string)($days_remaining);
        }
    @endphp

    <div class="countdown bounces">
        <div class="days">
            <div class="number bounces">
                {{ $days_remaining[0] }}
            </div>
            <div class="number bounces">
                {{ $days_remaining[1] }}
            </div>
        </div>
        <h3 class="label">
            Days
        </h3>
    </div>

    <div class="content">
        <div>
            <h1 class="bounces">Transmedia {{ date('Y') }}</h1>
            <p class="bounces">
                The Digital Media Courses' Student Exhibition
            </p>
            <a class="bounces" target="_blank" href="https://www.google.com/maps/place/The+University+of+Winchester,+West+Downs+Campus/@51.0622172,-1.3347646,17z/data=!3m1!4b1!4m5!3m4!1s0x48740d960a41ad79:0x23add09b67197561!8m2!3d51.0622172!4d-1.3325759">
                Come see us at the University of <br> Winchester, West Downs Center <br>
                <i class="fa-solid fa-location-dot"></i>
            </a>
        </div>
    </div>

    <div class="socials">
{{--        <a href="">--}}
{{--            <i class="fa-brands fa-facebook-f"></i>--}}
{{--        </a>--}}
        <a href="https://www.instagram.com/transmedia.winchester/" target="_blank">
            <i class="fa-brands fa-instagram"></i>
        </a>
{{--        <a href="">--}}
{{--            <i class="fa-brands fa-linkedin-in"></i>--}}
{{--        </a>--}}
    </div>
</main>

<script src="//cdn.jsdelivr.net/npm/vivus@latest/dist/vivus.min.js"></script>
<script>
    new Vivus('left-graphic', {duration: 200}).play();
    new Vivus('right-graphic', {duration: 200}).play();
</script>

</body>
</html>
