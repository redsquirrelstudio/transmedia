@extends('layouts.app')

@section('content')
    <div class="screen-block">
       <div class="twinmotion-embed-wrapper">
            <iframe style="height: 100%; width: 100%; min-height: 100vh; min-width: 100vw;"
                    title="Embedded presentation 'Transmedia Exhibition 2022'" frameborder="0"
                    allow="fullscreen; gyroscope; accelerometer; magnetometer; execution-while-out-of-viewport; execution-while-not-rendered;"
                    allowfullscreen mozallowfullscreen="true" webkitallowfullscreen="true"
                    src="https://twinmotion.unrealengine.com/presentation/E8ioLEvFV0vh0v2C?embed"
            >
            </iframe>
        </div>
    </div>
@endsection
