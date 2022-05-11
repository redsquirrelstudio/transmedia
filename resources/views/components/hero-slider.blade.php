<section class="hero-slider">
    <div class="slide">
        <video autoplay muted loop>
            <source src="{{ asset('/video/building_intro_seamlessloop.mp4') }}" type="video/mp4"/>
        </video>

        <div class="slide-caption">
            <h1>
               Transmedia 2022 Exhbition
            </h1>
            <p>
                This year, we're breaking out
            </p>
            <a href="{{ url('/exhibition') }}" class="call-to-action">
                Explore The Virtual Exhibition
            </a>
        </div>
    </div>

    @include('components/bottom-rip')

</section>
