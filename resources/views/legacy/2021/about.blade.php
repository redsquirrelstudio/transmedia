@extends('layouts.app')

@section('content')
    <div class="about-spacer"></div>
    <div class="about-split-block">
        <div class="split-section light">
            <div class="logo-container">
                <img class="logo" src="{{ asset('/images/logo_clear.png') }}" alt="Transmedia 2021">
            </div>
        </div>
        <div class="split-section">
            <div class="indented">
                <hr>
                <div class="content padded">
                    <h2>Transmedia {{ date('Y') }}</h2>
                    <p>
                        Welcome to the annual End of Year Exhibition ‘Transmedia 2021 & Pitch your Project Event’.
                        <br><br>

                        We are really excited to be able to share with you the work of all our students from the DMD, 3D
                        & CAD undergraduate programmes, including the MA Digital Media Practice & Pathways’ students.
                        You will also be able to explore specific pieces of work the student cohorts have chosen, to be
                        part of the new and exciting Virtual Exhibition, which can be accessed from the Menu link above.
                        You can access individual student work using the ‘Students’ link on the Menu bar. <br><br>

                        The Transmedia Exhibition has been planned, shaped and organised by us, the 2nd years, under the
                        guidance of our Project Focus Lecturer, Marina Brkljac. The Virtual Exhibition and this website as been designed and
                        developed by two of the 3rd years.<br><br>

                        We hope you enjoy exploring the work we have all been doing over the past year.
                    </p>
                </div>
            </div>
        </div>
    </div>
    <div class="screen-block pushed">
        <div class="image-full">
            <img src="{{ asset('/images/west_downs_birdseye.jpg') }}" alt="">
        </div>
    </div>
    <div class="about-split-block pushed">
        <div class="split-section">
            <div class="indented">
                <hr class="right">
                <div class="content padded">
                    <h2>The Digital Media <br>Studio</h2>
                    <p>
                        We are sad not to be able to meet you all in our amazing new Digital Media Studio. This is a
                        fantastic space in which we all collaborate, working in multi-disciplined groups on various
                        projects including live client projects. The DM programmes include Design, Development, 3D
                        Visualisation, 3D Environments (Game & Heritage), Computer Aided Design, and from next year, we
                        will also have Computer Game Design & Development students with us. <br><br>

                        In addition, our successful MA in Digital Media Practice and Pathways also use the Studio,
                        combining skills and encouraging
                        peer learning and knowledge exchange. Collectively, we are known as ‘DMD’ and form part of the
                        Department of Digital Technologies, in the Faculty of Business, Law and Digital technologies at
                        West Downs.
                    </p>
                </div>
            </div>
        </div>
        <div class="split-section brand">
            <div class="logo-container small-centered">
                <img src="{{ asset('/images/robot_full.png') }}" alt="" class="logo">
            </div>
        </div>
    </div>
    <div class="about-split-block" id="design">
        <div class="split-section light">
            <div class="logo-container">
                <img class="logo" src="{{ asset('/images/design_logo.png') }}" alt="Designers">
                <p class="caption">
                    Particuless by <a href="{{ url('students/26') }}">Maia McGhee</a>
                </p>
            </div>
        </div>
        <div class="split-section">
            <div class="indented">
                <hr>
                <div class="content padded">
                    <h2>Design</h2>
                    <p>
                        Our BA (Hons) Digital Media Design programme has been running since its validation in 2007,
                        gaining in popularity with a growing student cohort for areas such as graphic design, app and
                        web design, UX/UI and Design Thinking, game/interaction design, VR and AR interface design. <br><br>
                        We collaborate closely on designs and prototypes with our Digital Media Development peers
                        through
                        the first and second year, and then work individually on placements and our final major projects
                        in the 3rd year. Employability, Design Thinking and Sustainable Design form a major aspect of
                        all three years, with our work assessed via our online portfolios, building on work each year in
                        producing a valuable professional portfolio for future employers.
                    </p>
                    <a class="btn-c2a" href="{{ route('students.course', 'designers') }}">Meet our designers</a>
                </div>
            </div>
        </div>
    </div>
    <div class="about-split-block" id="development">
        <div class="split-section">
            <div class="indented">
                <hr class="right">
                <div class="content padded">
                    <h2>Development</h2>
                    <p>
                        Our BSc (Hons) Digital Media Development programme has also been running since its validation in
                        2007, usually a smaller cohort than designers but just as important for areas such as app and
                        web development, UX/UI and Design Thinking, game/interaction development, VR and AR development.
                        We collaborate closely with the designers, writing the code to make the working prototypes from
                        their designs, and discussing what would work and what may not. <br><br>
                        This relationship with the Digital Media Design peers lasts through the first and second year,
                        and then we work
                        individually on placements and our final major projects in the 3rd year. Employability, Design
                        Thinking and Sustainable Design form a major aspect of all three years, with our work assessed
                        via our online portfolios, building on work each year in producing a valuable professional
                        portfolio for future employers.
                    </p>
                    <a class="btn-c2a" href="{{ route('students.course', 'developers') }}">Meet our developers</a>
                </div>
            </div>
        </div>
        <div class="split-section brand">
            <div class="logo-container">
                <img class="logo" src="{{ asset('/images/dev_logo.png') }}" alt="Developers">
                <p class="caption">
                    Transform Aboriculture by <a href="{{ url('students/13') }}">Simon Wesley Jr</a>
                </p>
            </div>
        </div>
    </div>
    <div class="about-split-block" id="cad">
        <div class="split-section light">
            <div class="logo-container">
                <img class="logo" src="{{ asset('/images/cad_logo.png') }}" alt="CAD">
                <p class="caption">
                    Woodland Residence by <a href="{{ url('students/15') }}">Matt Nugent</a>
                </p>
            </div>
        </div>
        <div class="split-section">
            <div class="indented">
                <hr>
                <div class="content padded">
                    <h2>CAD</h2>
                    <p>
                        The BSc (Hons) Computer Aided Design programme is a reasonably new programme, validated as part
                        of our suite of programmes in 2018. This year is therefore the first in having a cohort in all
                        three years. We are interested in areas of architectural, product, environmental, landscape and
                        engineering design, learning the technical and ergonomic data required to be valuable to future
                        employers. <br><br>
                        In our first year and second year, we work closely with the Digital Media programmes
                        in designing and building 2D and 3D assets, interiors/exteriors of heritage buildings,
                        innovative products and sustainable living solutions. Similar to the other programmes, our work
                        is assessed via our individually designed online portfolios. Again, Employability, Design
                        Thinking and Sustainable Living form the backbone to each of the areas we study.
                    </p>
                    <a class="btn-c2a" href="{{ route('students.course', 'cad') }}">Meet our Computer aided
                        designers</a>
                </div>
            </div>
        </div>
    </div>
    <div class="about-split-block" id="3dvis">
        <div class="split-section">
            <div class="indented">
                <hr class="right">
                <div class="content padded">
                    <h2>3D Visualisation <br> Artists</h2>
                    <p>
                        Our BA (Hons) Digital Media Design in 3D Visualisation programme is a new programme now in its
                        3rd year. In 3D Vis, we learn how to model in 3D for creating models, visualisations,
                        characters, 3D printing assets for many areas such as AR, VR, game, animations, advertising, and
                        product visuals. We can choose which software we learn and focus on areas that interest us
                        individually as well as collaborate closely on projects through the first and second year with
                        our fellow designers, developers, CAD and 3D Environment students. <br><br>
                        We focus in more depth, individually, on placements and our final major projects in the 3rd
                        year. Employability, Design
                        Thinking and Sustainable Design form a major aspect in each of our three years, with our work
                        assessed via our online portfolios, building on this each year to produce a valuable
                        professional portfolio for future employers.
                    </p>
                    <a class="btn-c2a" href="{{ route('students.course', '3d-artists') }}">
                        Meet our 3D Visualisation Designers
                    </a>
                </div>
            </div>
        </div>
        <div class="split-section brand">
            <div class="logo-container">
                <img class="logo" src="{{ asset('/images/threed_logo.png') }}" alt="3D">
                <p class="caption">
                    MiMals by <a href="{{ url('students/19') }}">Cherry Hau</a>
                </p>
            </div>
        </div>
    </div>
    <div class="about-split-block" id="3denvironments">
        <div class="split-section light">
            <div class="logo-container">
                <img class="logo" src="{{ asset('/images/enviro_logo.png') }}" alt="3D environments">
                <p class="caption">
                    Vacuum Van by <a href="{{ url('students/24') }}">Anna McGurk</a>
                </p>
            </div>
        </div>
        <div class="split-section">
            <div class="indented">
                <hr>
                <div class="content padded">
                    <h2>3D Environments <br> (Game & Heritage)</h2>
                    <p>
                        Our BSc (Hons) Digital Media Development in 3D Environments (Game & Heritage programme is also a
                        new programme now in its 3rd year. In 3D Environments, we also learn how to model in 3D for
                        creating models and environments and learn how to use Unity and/or Unreal to create Environments
                        for use in Game or Heritage applications. <br><br>
                        Once in one of the game engines, we know we can export out to a variety of platforms for use in
                        AR, VR, game and animations/videos. We can choose which
                        software we learn and focus on areas that interest us individually as well as collaborate
                        closely on projects through the first and second year with our fellow designers, developers, CAD
                        and 3D Visualisation students. We focus in more depth, individually, on placements and our final
                        major projects in the 3rd year. Employability, Design Thinking and Sustainable Design form a
                        major aspect in each of our three years, with our work assessed via our online portfolios,
                        building on this each year to produce a valuable professional portfolio for future employers.
                    </p>
                    <a class="btn-c2a" href="{{ route('students.course', '3d-devs') }}">Meet our 3D Environment (Game & Heritage) Developers </a>
                </div>
            </div>
        </div>
    </div>
@endsection
