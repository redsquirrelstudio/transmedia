<div x-data="{ open: false }">
    <nav class="navbar">
        <div class="container-fluid">
            <div class="row">
                <ul class="col-12">
                    <ul>
                        <li>
                            <button x-on:click="open = !open" x-bind:class="open ? 'is-active':''"
                                    class="hamburger hamburger--collapse" type="button">
                              <span class="hamburger-box">
                                <span class="hamburger-inner"></span>
                              </span>
                            </button>
                        </li>
                        <li class="nav-brand">
                            <a href="{{ url('/') }}">
                                <h1>
                                    <span>Trans</span>media {{ date('Y') }}
                                </h1>
                            </a>
                        </li>
                    </ul>
                    @auth
                        <li class="nav-right nav-brand">
                            <a class="mr-4 inline-block" href="{{ url('/my-page') }}">
                                My Page
                            </a>
                            <a href="{{ url('/logout') }}">
                                Sign Out
                            </a>
                        </li>
                    @else
                        <li class="nav-right nav-brand">
                            <a href="{{ url('/login') }}">
                                Student Login
                            </a>
                        </li>
                    @endauth
                </ul>
            </div>

        </div>
    </nav>
    <div x-show="open" x-cloak
         x-transition:enter="entering"
         x-transition:enter-start="enter-start"
         x-transition:enter-end="enter-end"
         x-transition:enter="leaving"
         x-transition:leave-start="leave-start"
         x-transition:leave-end="leave-end"
         class="nav-menu">
        @include('components/red-graphic')
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <a class="nav-link" href="{{ url('/exhibition') }}">
                        Virtual Exhibition
                    </a>
                </div>
            </div>
            <div class="row">
                <div class="col-12">
                    <a class="nav-link" href="{{ url('/schedule') }}">
                        Pitch your project
                    </a>
                </div>
            </div>
            <div class="row">
                <div class="col-12">
                    <a class="nav-link" href="{{ url('/students') }}">
                        Students
                    </a>
                </div>
            </div>
            <div class="row">
                <div class="col-12">
                    <a class="nav-link" href="{{ url('/about') }}">
                        About
                    </a>
                </div>
            </div>
            <div class="row">
                <div class="col-12">
                    <a class="nav-link" href="{{ url('/projects') }}">
                        {{ date('Y') }} Projects
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>
