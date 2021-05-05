@extends('layouts.app')

@section('content')
    <div class="screen-block">
        <div class="schedule-heading">
            <h1>Event Schedule</h1>
            <p>
                Transmedia {{ date('Y') }} will be broadcast live on YouTube live where you can watch our third year
                students present business plans in the Dragons den style pitch your project
                <projects class=""></projects>
            </p>
        </div>
        <table class="schedule">
            <tbody>
            @foreach($schedule as $slot)
                <tr>
                    <td>
                        {{ $slot->formatted_date }}
                    </td>
                    <td class="big">
                        {{ $slot->description }}
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
@endsection
