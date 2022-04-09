@extends('layouts.app')

@section('content')

    <main class="home-page">
        @include('components/hero-slider')

        <section class="bg-gray">
            <div class="container">
                <div class="row">
                    <div class="col-md-3">
                        <div class="discipline-card large">
                            <img src="{{ asset('/images/west_downs_birdseye.jpg') }}" alt="West Downs">
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="discipline-card design">

                            <div class="caption">
                                Designers
                            </div>
                        </div>
                        <div class="discipline-card three-d">
                            <div class="caption">
                                3D Environments Developers
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="discipline-card development">

                            <div class="caption">
                                Developers
                            </div>
                        </div>
                        <div class="discipline-card three-d-vis">

                            <div class="caption">
                                3D Visualisation <br>Artists
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="discipline-card game-design">

                            <div class="caption">
                                Game Designers
                            </div>
                        </div>
                        <div class="discipline-card cad">

                            <div class="caption">
                                Computer Aided Designers
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <section class="bg-red">
            <svg class="rip" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1920 59">
                <path d="M0,0,81,59l37-41L228.56,59l26.66-29.5L280.11,59,367,20l12.67,39L524,16,769,52,949,18l44,41,12.44-29.5L1037,46l21.78-16.5L1091,44l195-26,263,30,79-36,55,38,118.89-20.5L1867.67,59,1920,0Z"/>
            </svg>

            @include('components/red-graphic')

            <div class="container">
                <div class="row">
                    <div class="col-md-4">
                        <div class="content">
                            <h2>Meet Our Students</h2>
                            <p>
                                The Transmedia Exhibition Lorem ipsum
                                dolor sit amet, consectetur adipiscing elit.
                                Nullam mattis risus id lectus feugiat, et
                                iaculis tellus mollis. Suspendisse vel orci
                                dictum, feugiat sapien sit amet, interdum
                                dolor. Maecenas nulla velit, pharetra at
                                urna sit amet, porta tempus sapien. Cras
                                varius, ipsum non dapibus posuere,
                                nisi nequ

                            </p>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-3">
                        <div class="discipline-card">

                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="discipline-card">

                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="discipline-card">

                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="discipline-card">

                        </div>
                    </div>
                </div>
            </div>

        </section>
    </main>


@endsection
