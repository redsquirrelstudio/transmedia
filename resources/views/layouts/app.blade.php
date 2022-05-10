<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Transmedia {{ date('Y') }} - This Year We're Breaking Out</title>
    <meta name="description"
          content="The official website for {{ date('Y') }}'s Transmedia exhibition hosted by the students of the University of Winchester's digital courses.">
    <link rel="apple-touch-icon" sizes="180x180" href="{{ asset('/images/apple-touch-icon.png') }}">
    <link rel="icon" type="image/png" sizes="32x32" href="{{ asset('/images/favicon-32x32.png') }}">
    <link rel="icon" type="image/png" sizes="16x16" href="{{ asset('/images/favicon-16x16.png') }}">
    <link rel="manifest" href="{{ asset('/images/site.webmanifest') }}">
    <link rel="mask-icon" href="{{ asset('/images/safari-pinned-tab.svg') }}" color="#c02e2e">
    <meta name="msapplication-TileColor" content="#c02e2e">
    <meta name="theme-color" content="#c02e2e">
    <link rel="stylesheet" href="{{ asset('/css/app.css?v='.time()) }}">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@300;400;500;600;700;800&display=swap"
          rel="stylesheet">
    <link rel="stylesheet"
          href="https://maxst.icons8.com/vue-static/landings/line-awesome/line-awesome/1.3.0/css/line-awesome.min.css">
    <script src="//unpkg.com/alpinejs" defer></script>
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
</head>
<body>
<div class="site-container">
    @include('components/navbar')
    @yield('content')
    <section class="bg-gray lg-image-container">
        <div class="lg-image ken-burns-container">
            <img class="ken-burns" src="{{ asset('/images/west_downs_large.jpg') }}" alt="">
            <div class="caption">
                <h3 data-aos="fade-left">
                    Thursday 12th May
                </h3>
                <p data-aos="fade">
                    The University of Winchester, Romsey Rd, Winchester SO22 5FT
                </p>
            </div>
        </div>
    </section>

    <section class="bg-red">
        @include('components/top-rip')
        @include('components/red-graphic')
        <div class="container content">
            <div class="row">
                <div class="col-md-6">
                    <a data-aos="zoom-out-up" class="yearbook-container" download href="{{ asset('/images/TransmediaYearBook2022.pdf') }}">
                        <img class="yearbook" src="{{ asset('/images/yearbook.jpg') }}" alt="Year Book 2022">
                    </a>
                </div>
                <div class="col-md-1"></div>
                <div class="col-md-5">
                    <div class="yearbook-advert">
                        <div data-aos="fade-left">
                            <h2>
                                Transmedia <br> 2022 Year Book
                            </h2>
                            <p>
                                Meet all of our students and see what their best skills are in our 2022
                                year book, easily downloadable as a PDF. <strong>Click the book to download!</strong>
                            </p>
                        </div>

                    </div>
                </div>
            </div>

        </div>
    </section>

    @include('components/footer')
</div>
<script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
<script>
    AOS.init();
</script>
</body>
</html>
