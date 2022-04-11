@extends('layouts.app')

@section('content')
<div class="about_container">
    <div class="container">
        <div class="row">
            <div class="col-md-7 textpadding">
                <h1><span class="orangeheadtext">Pitch your project.</span> Take a look at the presentation schedule for
                    the day.</h1>
                <div class="spacer"></div>
                <p class="lead">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor
                    incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation
                    ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>
                <div class="padding30"></div>
                <button type="button" class="btn btn-primary">Primary</button>
            </div>
            <div class="col-md-5">
                <div class="padding30"></div>
                <img class="bd-placeholder-img bd-placeholder-img-lg featurette-image img-fluid mx-auto roundedimg aboutheadimg"
                    width="500" height="500" src="{{ asset('images/pitch.jpg')}}" alt="aboutheadimg">
            </div>
        </div>
    </div>
    <svg class="rip" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1920 59">
        <path
            d="M0,0,81,59l37-41L228.56,59l26.66-29.5L280.11,59,367,20l12.67,39L524,16,769,52,949,18l44,41,12.44-29.5L1037,46l21.78-16.5L1091,44l195-26,263,30,79-36,55,38,118.89-20.5L1867.67,59,1920,0Z" />
    </svg>

</div>
<div class="padding60"></div>

    <div class="container">
        <div class="row col-md-7">
            <h1>The timings.</h1>
            <p class="lead"> Be sure not to miss the students presenting their work. The 2nd year's wil be presenting
                their Group Client Project and the 3rd year's thier Pitch your Project.</p>
        </div>
        <div class="row col-md-5"></div>
        <div>
        <table style="width:100%">
                <tr>
                    <th class="colorcol roundtop">Student</th>
                    <th class="midtablecol">Year</th>
                    <th class="colorcol">Time</th>
                </tr>
                <tr>
                    <td  class="colorcol">John-Paul</td>
                    <td class="midtablecol">3rd</td>
                    <td class="colorcol">10:30</td>
                </tr>
                <tr>
                    <td class="colorcol">Elizabeth</td>
                    <td class="midtablecol">3rd</td>
                    <td class="colorcol">11:0</td>
                </tr>
                <tr>
                    <td class="colorcol">Alfreds Futterkiste</td>
                    <td class="midtablecol">2nd</td>
                    <td class="colorcol">10:00</td>
                </tr>
                <tr>
                    <td class="colorcol">Sinead Marais</td>
                    <td class="midtablecol">2nd</td>
                    <td class="colorcol">10:10</td>
                </tr>
            </table>
        </div>
    </div>
</div>

<div class="padding60"></div>
<div class="linebackground">
    <img class="linessvg" src="{{ asset('images/lines.svg')}}">
<div class="container">
    <div class="row col-md-7">
        <h1>The Students.</h1>
        <p class="lead">Add the 'Students' section here. Get to know the student who will be presenting on the day!</p>
    </div>
    <div class="row col-md-5"></div>
</div>
</div>

<div class="padding30"></div>
<div class="container">
    <div class="row">
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

</div>

<div class="padding60"></div>

</div>

@endsection