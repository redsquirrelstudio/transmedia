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
                    <a data-aos="zoom-out-up" class="yearbook-container" download
                       href="{{ asset('/images/TransmediaYearBook2022.pdf') }}">
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
        @include('components/bottom-rip')
    </section>

    <section class="bg-gray">
        <div class="container">
            <div class="row">
                <div class="col-md-4">
                    <div class="content">
                        <h2 data-aos="fade-right">The Schedule</h2>
                        <p data-aos="fade-right" data-aos-delay="100">
                            Make sure you don't miss out anything on the day! <br> The full schedule for the day is
                            below so that
                            you know when the student you want to see is presenting or when to plan to eat.
                        </p>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <table class="schedule-table">
                        <thead>
                        <tr>
                            <th data-aos="fade-down" class="table-green">
                                Sessions
                            </th>
                            <th data-aos="fade-down" data-aos-delay="100" class="table-yellow">
                                Events
                            </th>
                            <th data-aos="fade-down" data-aos-delay="200" class="table-red">
                                Exhibition Rooms
                            </th>
                            <th data-aos="fade-down" data-aos-delay="300" class="table-purple">
                                Pitch Your Project
                            </th>
                            <th data-aos="fade-down" data-aos-delay="400" class="table-cyan">
                                Pitching Students
                            </th>
                        </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td data-aos="fade-right" class="table-blue">
                                    10:30am Panel Arrives
                                </td>
                                <td data-aos="zoom-in" rowspan="6" class="table-yellow">
                                    Final Student Setup
                                </td>
                                <td rowspan="6" class="table-red" data-aos="zoom-in">
                                    Final Student Setup
                                </td>
                                <td class="table-blue" data-aos="zoom-in">
                                    Each student has a 5min pitch with
                                    5min of questions/feedback
                                </td>
                                <td class="table-blue" data-aos="fade-left">
                                    Pitching Starts at 10:40am
                                </td>
                            </tr>
                            <tr>
                                <td data-aos="fade-right" class="table-green">
                                    10:40 - 11:00
                                </td>
                                <td data-aos="zoom-in" class="table-purple">
                                    2x 3D Environment Students
                                </td>
                                <td class="table-blue" data-aos="fade-left">
                                    Will Cramb - Robyn Harvest <br>
                                    James Palmer - VR Auditorium
                                </td>
                            </tr>
                            <tr>
                                <td data-aos="fade-right" class="table-green">
                                    11:00 - 11:20
                                </td>
                                <td data-aos="zoom-in" class="table-purple">
                                    2x CAD Students
                                </td>
                                <td class="table-blue" data-aos="fade-left">
                                    Albert Ignatscu - Help came on a boat <br>
                                    Emily Hellwege - Home - A Sketchy Place
                                </td>
                            </tr>
                            <tr>
                                <td data-aos="fade-right" class="table-green">
                                    11:20 - 11:40
                                </td>
                                <td data-aos="zoom-in" class="table-purple">
                                    2x Design Students
                                </td>
                                <td class="table-blue" data-aos="fade-left">
                                    Jan Pelagio - Memoria<br>
                                    Cat Phongsinual - Magimote
                                </td>
                            </tr>
                            <tr>
                                <td data-aos="fade-right" class="table-green">
                                    11:40 - 12:00
                                </td>
                                <td data-aos="zoom-in" class="table-purple">
                                    2x Development Students
                                </td>
                                <td class="table-blue" data-aos="fade-left">
                                    Alfie Smith - Atlas - Big Worlds Made Small <br>
                                    Alex Wardle - Swype
                                </td>
                            </tr>
                            <tr>
                                <td data-aos="fade-right" class="table-green">
                                    12:00 - 12:20
                                </td>
                                <td data-aos="zoom-in" class="table-purple">
                                    2x 3D Environments Students
                                </td>
                                <td class="table-blue" data-aos="fade-left">
                                    Tomos Jackson - Digital asset creation site, with AR format inclusion<br>
                                    Alex Stickland - OddShoe Studios
                                </td>
                            </tr>
                            <tr>
                                <td data-aos="fade-right" class="table-green">
                                    12:20 - 13:00
                                </td>
                                <td data-aos="zoom-in" data-aos-delay="100" class="table-green">
                                    LUNCH
                                </td>
                                <td data-aos="zoom-in" data-aos-delay="200" class="table-green">
                                    LUNCH
                                </td>
                                <td data-aos="zoom-in" data-aos-delay="300" class="table-green">
                                    LUNCH
                                </td>
                                <td data-aos="zoom-in" data-aos-delay="400" class="table-green">
                                    LUNCH
                                </td>
                            </tr>
                            <tr>
                                <td data-aos="fade-right" class="table-green">
                                    13:00 - 13:20
                                </td>
                                <td data-aos="zoom-in" class="table-yellow" rowspan="6">
                                    Industry Networking 13:00 - 19:00
                                </td>
                                <td class="table-red" rowspan="6">
                                    2nd Year Client Project Presentations 13:15 Start
                                </td>
                                <td class="table-purple">
                                    2X CAD Students
                                </td>
                                <td class="table-blue" data-aos="fade-left">
                                    Alex Pritchett - Protectorch <br>
                                    Lucy Hopkins - Community Canvas
                                </td>
                            </tr>
                            <tr>
                                <td data-aos="fade-right" class="table-green">
                                    13:20 - 13:40
                                </td>
                                <td data-aos="zoom-in" class="table-purple">
                                    2x Design Students
                                </td>
                                <td class="table-blue" data-aos="fade-left">
                                    Sammi Masson - Youthforic <br>
                                    Maia McGhee - WhichRug
                                </td>
                            </tr>
                            <tr>
                                <td data-aos="fade-right" class="table-green">
                                    13:40 - 14:00
                                </td>
                                <td data-aos="zoom-in" class="table-purple">
                                    2x Development Students
                                </td>
                                <td class="table-blue" data-aos="fade-left">
                                    Luke Allisstone - STITCH.LDN <br>
                                    Marcus Marszalek - Cryptocurrency Trading and
                                    Social Platform
                                </td>

                            </tr>
                            <tr>
                                <td data-aos="fade-right" class="table-green">
                                    14:00 - 14:20
                                </td>
                                <td data-aos="zoom-in" class="table-purple">
                                    2x 3D Environment Students
                                </td>
                                <td class="table-blue" data-aos="fade-left">
                                    Charlie Holland - C.H Lighting <br>
                                    Joe Walsh - Zephyr NFT
                                </td>
                            </tr>
                            <tr>
                                <td data-aos="fade-right" class="table-green">
                                    14:20 - 14:40
                                </td>
                                <td data-aos="zoom-in" class="table-purple">
                                    2x Design Students
                                </td>
                                <td class="table-blue" data-aos="fade-left">
                                    Kristine Berg Evensen - Wellbeing <br>
                                    Kat Evans - Solo Ring
                                </td>
                            </tr>
                            <tr>
                                <td data-aos="fade-right" class="table-green">
                                    14:40 - 15:00
                                </td>
                                <td data-aos="zoom-in" class="table-purple">
                                    1x 3D Environment Student <br><br>
                                    1x 3D Vis Student
                                </td>
                                <td class="table-blue" data-aos="fade-left">
                                    Anna McGurk - The Smartbrolly <br>
                                    Yurie Shigemura - Biophil Design
                                </td>
                            </tr>
                            <tr>
                                <td  data-aos="fade-right" class="table-green">
                                    15:00 - 15:20
                                </td>
                                <td data-aos="zoom-in" data-aos-delay="100" class="table-green">
                                    BREAK
                                </td>
                                <td data-aos="zoom-in" data-aos-delay="200" class="table-green">
                                    BREAK
                                </td>
                                <td data-aos="zoom-in" data-aos-delay="300" class="table-green">
                                    BREAK
                                </td>
                                <td data-aos="zoom-in" data-aos-delay="400" class="table-green">
                                    BREAK
                                </td>
                            </tr>
                            <tr>
                                <td data-aos="fade-right" class="table-green">
                                    15:20 - 15:40
                                </td>
                                <td data-aos="zoom-in" class="table-yellow" rowspan="4">
                                    Industry Networking 13:00 - 19:00
                                </td>
                                <td data-aos="zoom-in" class="table-red" rowspan="4">
                                    1st Year Interactive Project Presentations 15:30 Start
                                </td>
                                <td data-aos="zoom-in" class="table-purple">
                                    2x CAD Students
                                </td>
                                <td class="table-blue" data-aos="fade-left">
                                    Hugo Willis - Live Logos <br>
                                    Dean Collins - Customisable Bubbleheads
                                </td>
                            </tr>
                            <tr>
                                <td data-aos="fade-right" class="table-green">
                                    15:40 - 16:00
                                </td>
                                <td data-aos="zoom-in"  class="table-purple">
                                    2x Design Students
                                </td>
                                <td class="table-blue" data-aos="fade-left">
                                    Luke Wesley - Fitted for You <br>
                                    Oliver Pullar - Gradecase
                                </td>
                            </tr>
                            <tr>
                                <td data-aos="fade-right" class="table-green">
                                    16:00 - 16:20
                                </td>
                                <td data-aos="zoom-in" class="table-purple">
                                    2x CAD Students
                                </td>
                                <td class="table-blue" data-aos="fade-left">
                                    Lewis Ainsworth - Charged <br>
                                    Jack Day - Parallel Printing
                                </td>
                            </tr>
                            <tr>
                                <td data-aos="fade-right" class="table-green">
                                    16:20 - 16:40
                                </td>
                                <td data-aos="zoom-in" class="table-purple">
                                    2 Design Students
                                </td>
                                <td class="table-blue" data-aos="fade-left">
                                    Michael Foster-Reed - Holo Games <br>
                                    Aidan Waldron - StoneyTiger
                                </td>
                            </tr>
                            <tr>
                                <td data-aos="fade-right" class="table-green">
                                    16:40 - 17:00
                                </td>
                                <td data-aos="zoom-in" data-aos-delay="100" class="table-green">
                                    PANEL
                                </td>
                                <td data-aos="zoom-in" data-aos-delay="200" class="table-green">
                                    PANEL
                                </td>
                                <td data-aos="zoom-in" data-aos-delay="300" class="table-green">
                                    PANEL
                                </td>
                                <td data-aos="zoom-in" data-aos-delay="400" class="table-green">
                                    CONSIDERATION OF AWARDS
                                </td>
                            </tr>
                            <tr>
                                <td data-aos="fade-right" class="table-blue">
                                    17:00
                                </td>
                                <td data-aos="zoom-in" colspan="4" class="table-blue center">
                                    <strong>
                                        ANNOUNCEMENT OF AWARDS
                                    </strong>
                                    <p>
                                        <strong>
                                            Pitch your project:
                                        </strong>
                                        Most commercially Viable Award & Best Pitch Award
                                    </p>
                                    <p>
                                        <strong>
                                            Exhibition
                                        </strong>
                                        Most Popular Stand, Most Interactive Stand and Best Virtual Exhibit
                                    </p>
                                </td>
                            </tr>
                            <tr>
                                <td data-aos="fade-right" class="table-blue">
                                    17:30 - 19:00
                                </td>
                                <td data-aos="zoom-in" colspan="4" class="table-blue center">
                                    <strong>
                                        NETWORKING
                                    </strong>
                                </td>
                            </tr>
                        </tbody>
                    </table>
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
