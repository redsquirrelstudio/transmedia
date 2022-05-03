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

    <link rel="stylesheet" href="{{ asset('/css/app.css') }}">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@300;400;500;600;700;800&display=swap"
          rel="stylesheet">
    <link rel="stylesheet" href="https://maxst.icons8.com/vue-static/landings/line-awesome/line-awesome/1.3.0/css/line-awesome.min.css">

    <script src="//unpkg.com/alpinejs" defer></script>
</head>
<body>
<div class="site-container">
    @include('components/navbar')
    @yield('content')
    <section class="bg-gray lg-image-container">
        <div class="lg-image ken-burns-container">
            <img class="ken-burns" src="{{ asset('/images/west_downs_large.jpg') }}" alt="">
            <div class="caption">
                <h3>
                    Thursday 12th May
                </h3>
                <p>
                    The University of, Romsey Rd, Winchester SO22 5FT
                </p>
            </div>
        </div>
    </section>

    @include('components/footer')
</div>
</body>
</html>
