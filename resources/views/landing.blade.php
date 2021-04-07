<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Transmedia 2021</title>
    <link rel="stylesheet" href="{{ asset('/css/app.css') }}">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Work+Sans:wght@300;400;600;800;900&&family=Roboto:wght@400;700&display=swap" rel="stylesheet">
</head>
<body>
<div class="landing" id="app">
    <div class="video-container">
        <video autoplay muted loop class="video-background">
            <source src="{{ asset('/video/transmedia_square.mp4') }}" type="video/mp4">
        </video>
        <div class="video-title">
            <h4>
                Student Virtual Exhibition
            </h4>
            <h2>
                Transmedia
            </h2>
            <h3>
                {{ date('Y') }}
            </h3>
        </div>
    </div>
    <div class="block bordered">
        <div class="flex-container">
            <div class="half">
                <div class="image-circle">
                    <img src="{{ asset('/images/west_downs_birdseye.jpg') }}" alt="">
                </div>
            </div>
            <div class="half padded-right">
                <h2>The Digital Media Department, <br> University of Winchester</h2>
                <p>
                    The Transmedia Exhibition is an annual end of year show for Digital Media Courses where students can
                    showcase their best work.
                </p>
                <p>
                    This year, we are proudly presenting our work in a virtual gallery space.
                </p>
                <p>
                    Please join us on the <strong>6th May 2021</strong> as we would like to introduce you to best
                    examples of Digital
                    Design, Development, CAD and 3D art the University of Winchester Students have to offer.
                </p>
            </div>
        </div>
    </div>
    <div class="block light bordered">
        <div class="flex-container">
            <div class="half padded-left">
                <h2>
                    Join the DMD community mailing list!
                </h2>
                <p>
                    We'll share <strong>Transmedia Event</strong> info and all that good stuff!
                </p>
                <p>
                    DON'T BE A SQUARE - BE A BILLIONAIRE! <br>
                    <small>In terms of Transmedia knowledge anyway.</small>
                </p>
                <mail-form api-url="{{ route('newsletter.subscribe') }}"></mail-form>
            </div>
            <div class="half">
                <div class="robot">
                    <img src="{{ asset('/images/robot_outline.png') }}" alt="Transmedia Robot">
                </div>
            </div>
        </div>
    </div>
    <div class="block bordered">
        <countdown start-time="{{ date('M j, Y H:m:s') }}"
                   end-time="{{ date('M j, Y H:m:s', strtotime('06-05-2021 10:00:00')) }}"></countdown>
    </div>
</div>
<script type="text/javascript" src="{{ asset('/js/app.js') }}"></script>
</body>
</html>
