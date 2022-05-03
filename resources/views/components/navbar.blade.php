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
                    <li class="nav-right nav-brand">
                        <a href="{{ url('/login') }}">
                            Student Login
                        </a>
                    </li>
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
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <a class="link-1" href="{{ url('/exhibition') }}">
                        Virtual Exhibition
                    </a>
                </div>
            </div>
            <div class="row">
                <div class="col-12">
                    <a class="link-2" href="{{ url('/schedule') }}">
                        Pitch your project
                    </a>
                </div>
            </div>
            <div class="row">
                <div class="col-12">
                    <a class="link-3" href="{{ url('/students') }}">
                        Students
                    </a>
                </div>
            </div>
            <div class="row">
                <div class="col-12">
                    <a class="link-4" href="{{ url('/about') }}">
                        About
                    </a>
                    <a class="link-5" href="{{ url('/projects') }}">
                        {{ date('Y') }} Projects
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>
