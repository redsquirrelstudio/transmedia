<nav class="navbar">
    <ul class="nav-items">
        <div class="nav-left">
            <li class="nav-item">
                <a href="{{ url('/') }}">Transmedia {{ date('Y') }}</a>
            </li>
            <li class="nav-item">
                <a href="{{ url('/students') }}">Students</a>
            </li>
            <li class="nav-item">
                <a href="">Event</a>
            </li>
            <li class="nav-item">
                <a href="{{ url('/exhibition') }}">Virtual Exhibition</a>
            </li>
            @auth
                <li class="nav-item">
                    <a href="{{ url('/my-page') }}">My Page</a>
                </li>
            @endauth
        </div>
        <div class="nav-right">
            @auth
                <li class="nav-item">
                    Welcome {{ auth()->user()->name }} -
                    <a href="{{ url('/logout') }}">Sign out</a>
                </li>
            @else
                <li class="nav-item">
                    <a href="{{ url('/login') }}">Sign in</a>
                </li>
            @endauth

            <li class="nav-item">
                <a href="">
                    <i class="lab la-facebook-square"></i>
                </a>
                <a href="">
                    <i class="lab la-instagram"></i>
                </a>
            </li>
        </div>
    </ul>
</nav>
