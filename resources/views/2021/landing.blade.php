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
    <link
        href="https://fonts.googleapis.com/css2?family=Work+Sans:wght@300;400;600;800;900&&family=Roboto:wght@400;700&display=swap"
        rel="stylesheet">
</head>
<body>
<div class="landing scroll-container" id="app">
    <div class="video-container">
        @if(Options::get('student-login'))
            @auth
                <a href="{{ route('auth.logout') }}" class="student-login">
                    LOGOUT
                </a>
            @else
                <a href="{{ route('page.login') }}" class="student-login">
                    STUDENT LOGIN
                </a>
            @endif
        @endif

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
                    The Transmedia Exhibition is our annual End of Year Exhibition, covering all of our Digital Media
                    programmes, our platform to showcase our best work.
                </p>
                <p>
                    Please join us on the 6th May 2021, when we can proudly introduce you to our amazing virtual gallery
                    and our individual student portfolios which will be found on this website.
                </p>
                <p>
                    You will also be able to watch our 3rd year cohort present their business ideas to a panel of judges
                    in ‘Pitch Your Project’, via Teams. There will be two awards the 3rd years will be competing for:
                    ‘The Best Pitch 2021’ and ‘The Most Commercially Viable Business Idea 2021’.
                </p>
            </div>
        </div>
    </div>
    <div class="block light bordered">
        <div class="flex-container">
            <div class="half padded-left">
                <h2>
                    Join the DMD community <br>mailing list!
                </h2>
                <p>
                    We'll share <strong>Transmedia Event & Pitch your project</strong> info if you sign up!
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
