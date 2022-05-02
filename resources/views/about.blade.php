@extends('layouts.app')

@section('content')
    <div class="bg-red">
        <div class="container">
            <div class="row">
                <div class="col-md-6">
                    <div class="content">
                        <h2>
                            <strong>
                                Our Mission.
                            </strong> <br>
                            <span class="font-normal">
                                To create a physical and virtual exhibition to
                            showcase our students work
                            </span>
                        </h2>
                        <div class="spacer"></div>
                        <p class="lead">
                            Welcome to the annual End of Year Exhibition ‘Transmedia 2021 & Pitch your Project Event’.
                            <br><br>
                            We are really excited to be able to share with you the work of all our students from the
                            DMD, 3D & CAD undergraduate programmes, including the MA Digital Media Practice & Pathways’
                            students. You will also be able to explore specific pieces of work the student cohorts have
                            chosen, to be part of the new and exciting Virtual Exhibition, which can be accessed from
                            the Menu link above. You can access individual student work using the ‘Students’ link on the
                            Menu bar.
                            <br><br>
                            The Transmedia Exhibition has been planned, shaped and organised by us, the 2nd years, under
                            the guidance of our Project Focus Lecturer, Marina Brkljac. The Virtual Exhibition and this
                            website as been designed and developed by two of the 3rd years.
                            <br><br>
                            We hope you enjoy exploring the work we have all been doing over the past year.
                        </p>
                    </div>
                </div>
                <div class="col-md-1"></div>
                <div class="col-md-5">
                    <img
                        class="bd-placeholder-img bd-placeholder-img-lg featurette-image img-fluid mx-auto roundedimg aboutheadimg"
                        width="500" height="500" src="{{ asset('images/library.jpg')}}" alt="aboutheadimg">
                </div>
            </div>
            @include('components/bottom-rip')

        </div>
    </div>
    <div class="bg-gray">
        <div class="container">
            <div class="row">
                <div class="col-md-7">
                    <div class="content">
                        <h2>
                            The Exhibition.
                        </h2>
                        <p>
                            We're excited to be inviting guests to come visit us in person this year! We run this
                            exhibition to allow students from all four years to display their work for you all. We
                            encourage family and friends to come and support as well as businesses from the Winchester area to attend.
                        </p>
                    </div>
                </div>
            </div>
            <div class="row content">
                <div class="col-md-3 col-sm-6 col-xs-12">
                    <a href="LinkT">
                        <img alt="AltText" src="https://via.placeholder.com/250"
                             class="img-fluid mx-auto roundedimg img-responsive">
                    </a>
                </div>

                <div class="col-md-3 col-sm-6 col-xs-12">
                    <a href="LinkT">
                        <img alt="AltText" src="https://via.placeholder.com/250"
                             class="img-fluid mx-auto roundedimg img-responsive">
                    </a>
                </div>

                <div class="col-md-3 col-sm-6 col-xs-12">
                    <a href="LinkT">
                        <img alt="AltText" src="https://via.placeholder.com/250"
                             class="img-fluid mx-auto roundedimg img-responsive">
                    </a>
                </div>

                <div class="col-md-3 col-sm-6 col-xs-12">
                    <a href="LinkT">
                        <img alt="AltText" src="https://via.placeholder.com/250"
                             class="img-fluid mx-auto roundedimg img-responsive">
                    </a>
                </div>
            </div>
            @include('components/red-graphic-2')
        </div>
    </div>
    <div class="red-banner">
        <div class="container">
            <div class="row">
                <div class="col-md-6 mx-auto">
                    <h1>
                        Got any questions?
                    </h1>
                    <p class="lead">
                        Feel free to send us a message via email and we'll get back to you as soon as possible with
                        what you need to know about the exhibition.
                    </p>
                </div>
            </div>
            <a href="mailto:info@transmediawinchester.co.uk" type="button" class="btn btn-primary">
                Contact
            </a>
        </div>
        @include('components/bottom-rip')
    </div>
@endsection
