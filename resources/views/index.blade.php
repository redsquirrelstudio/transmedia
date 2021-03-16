@extends('layouts.app')

@section('content')
    <div class="top">
        <animated-lightbulb
            outlined="{{ asset('/img/logo_outline.svg') }}"
            logo="{{ asset('/img/logo.svg') }}">
        </animated-lightbulb>
    </div>
    <div id="about" class="main-content">
        <div class="about">
            <h2>
                About the Exhibition
            </h2>
            <div class="about-content">
                <p>
                    The Transmedia exhibition is an annual end of year show for the Digital media courses to showcase their
                    best work to both students in other courses and industry professionals.<br><br>
                    This site is the center for all information about the event. Here you'll find information about
                    students,
                    examples of their work and their specialisms. The option to walk around our virtual exhibition is also
                    available where you can view work within a 3D gallery like space. <br><br>
                    Whilst browsing you will find the best examples of digital design, development, CAD and 3D art
                    the University of Winchester has to offer.
                    <br>
                    <a href="{{ url('/exhibition') }}" class="btn-primary">
                        Enter the Exhibition
                    </a>
                </p>
                <div class="atom-animation">
                    <img class="center" src="{{ asset('/img/uni_logo.svg')  }}" alt="">
                    <div class="moons">
                        <img class="moon top-left" src="{{ asset('/img/design_logo.svg')  }}" alt="Designers">
                        <img class="moon top-right" src="{{ asset('/img/threed_logo.svg')  }}" alt="3D Artists">
                        <img class="moon bottom-left" src="{{ asset('/img/cad_logo.svg')  }}" alt="CAD">
                        <img class="moon bottom-right" src="{{ asset('/img/dev_logo.svg')  }}" alt="Developers">
                    </div>
                </div>
            </div>
        </div>
        <div class="students">
            <h2>
                Our Students
            </h2>
        </div>
    </div>
@endsection
