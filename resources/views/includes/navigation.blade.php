<nav class="navbar">
    <ul class="navbar-items left">
        <li class="navbar-brand">
            <a href="{{ url('/') }}">
                @auth
                    Welcome {{ auth()->user()->name }}
                @else
                    Transmedia {{ date('Y') }}
                @endauth
            </a>
        </li>
        <li @if(request()->routeIs('page.about')) class="active" @endif>
            <a href="{{ url('/about') }}">
                About
            </a>
        </li>
        <li @if(request()->route()->getPrefix() === '/projects') class="active" @endif>
            <a href="{{ url('/projects') }}">
                2021 Projects
            </a>
        </li>
        <li @if(request()->route()->getPrefix() === '/students') class="active" @endif>
            <a href="{{ url('/students') }}">
                Students
            </a>
        </li>
        <li @if(request()->routeIs('page.exhibition')) class="active" @endif>
            <a href="{{ url('/exhibition') }}">
                Virtual Exhibition
            </a>
        </li>
    </ul>
    <ul class="navbar-items right">
        @auth
            <li @if(request()->routeIs('page.personal')) class="active" @endif>
                <a href="{{ url('/my-page') }}">
                    My Page
                </a>
            </li>
        @endauth
        <li>
            <a href="">
                Shop
            </a>
        </li>
        <li>
            <a href="">
                Contact
            </a>
        </li>
        <li class="hamburger-container">
            <button @click="showMobile = !showMobile" :class="`hamburger hamburger--spin ${showMobile ? 'is-active' : ''}`" type="button">
              <span class="hamburger-box">
                <span class="hamburger-inner"></span>
              </span>
            </button>
        </li>
    </ul>
</nav>
<mobile-navbar></mobile-navbar>
