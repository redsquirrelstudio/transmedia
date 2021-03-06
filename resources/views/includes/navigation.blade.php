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
        <li @if(request()->routeIs('page.schedule')) class="active" @endif>
            <a href="{{ url('/schedule') }}">
                Pitch Your Project
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
            <a href="mailto:info@transmediawinchester.co.uk">
                Contact
            </a>
        </li>
        <li class="hamburger-container">
            <button @click="showMobile = !showMobile"
                    :class="`hamburger hamburger--spin ${showMobile ? 'is-active' : ''}`" type="button">
              <span class="hamburger-box">
                <span class="hamburger-inner"></span>
              </span>
            </button>
        </li>
    </ul>
</nav>
<transition name="slide-left">
    <mobile-navbar v-if="showMobile">
        <template v-slot:content>
            <ul class="mobile-links">
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
                <li @if(request()->routeIs('page.schedule')) class="active" @endif>
                    <a href="{{ url('/schedule') }}">
                        Pitch Your Project
                    </a>
                </li>
                @auth
                    <li @if(request()->routeIs('page.personal')) class="active" @endif>
                        <a href="{{ url('/my-page') }}">
                            My Page
                        </a>
                    </li>
                @endauth
                <li>
                    <a href="mailto:info@transmediawinchester.co.uk">
                        Contact
                    </a>
                </li>
            </ul>

            <img class="wave-bottom" src="{{ asset('/images/wave_bottom.svg') }}" alt="wave">
        </template>
    </mobile-navbar>
</transition>

