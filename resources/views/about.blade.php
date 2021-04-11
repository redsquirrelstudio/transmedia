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
                        Welcome to the DMD Department's annual Transmedia event. here we Lorem ipsum dolor sit amet,
                        consectetur adipisicing elit. Dolorum exercitationem ipsa molestiae nihil, repudiandae
                        veritatis? Autem cumque, facilis labore magnam minima officia perspiciatis placeat possimus
                        reprehenderit vitae. Accusantium, delectus libero.
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
                    <h2>The Digital Media <br> Department</h2>
                    <p>
                        Lorem ipsum dolor sit amet, consectetur adipisicing elit. Accusantium autem expedita, hic
                        inventore natus qui quo reiciendis tempora ullam voluptatibus! Aspernatur at deserunt molestiae
                        molestias nobis quas. Animi provident, saepe.
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
    <div class="about-split-block">
        <div class="split-section light">
            <div class="logo-small-container">
                <img class="logo-small" src="{{ asset('/images/design_logo.png') }}" alt="Designers">
            </div>
        </div>
        <div class="split-section">
            <div class="indented">
                <hr>
                <div class="content padded">
                    <h2>Design</h2>
                    <p>
                        Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aliquam aut consectetur delectus eaque
                        minus obcaecati pariatur quos. Aut expedita iste non quasi recusandae repellendus! Dolorum est
                        incidunt sint soluta tempore.
                    </p>
                </div>
            </div>
        </div>
    </div>
    <div class="about-split-block">
        <div class="split-section">
            <div class="indented">
                <hr class="right">
                <div class="content padded">
                    <h2>Development</h2>
                    <p>
                        Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aliquam aut consectetur delectus eaque
                        minus obcaecati pariatur quos. Aut expedita iste non quasi recusandae repellendus! Dolorum est
                        incidunt sint soluta tempore.
                    </p>
                </div>
            </div>
        </div>
        <div class="split-section brand">
            <div class="logo-small-container">
                <img class="logo-small" src="{{ asset('/images/dev_logo.png') }}" alt="Developers">
            </div>
        </div>
    </div>
    <div class="about-split-block">
        <div class="split-section light">
            <div class="logo-small-container">
                <img class="logo-small" src="{{ asset('/images/cad_logo.png') }}" alt="CAD">
            </div>
        </div>
        <div class="split-section">
            <div class="indented">
                <hr>
                <div class="content padded">
                    <h2>CAD</h2>
                    <p>
                        Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aliquam aut consectetur delectus eaque
                        minus obcaecati pariatur quos. Aut expedita iste non quasi recusandae repellendus! Dolorum est
                        incidunt sint soluta tempore.
                    </p>
                </div>
            </div>
        </div>
    </div>
    <div class="about-split-block">
        <div class="split-section">
            <div class="indented">
                <hr class="right">
                <div class="content padded">
                    <h2>3D Visualisation</h2>
                    <p>
                        Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aliquam aut consectetur delectus eaque
                        minus obcaecati pariatur quos. Aut expedita iste non quasi recusandae repellendus! Dolorum est
                        incidunt sint soluta tempore.
                    </p>
                </div>
            </div>
        </div>
        <div class="split-section brand">
            <div class="logo-small-container">
                <img class="logo-small" src="{{ asset('/images/threed_logo.png') }}" alt="3D">
            </div>
        </div>
    </div>
@endsection
