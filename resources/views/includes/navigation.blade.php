<nav class="navbar">
    <ul class="navbar-items left">
        <li>
            <a href="{{ url('/') }}">
                @auth
                    Welcome {{ auth()->user()->name }}
                @else
                    Transmedia {{ date('Y') }}
                @endauth
            </a>
        </li>
        <li>
            <a href="">
                About
            </a>
        </li>
        <li>
            <a href="">
                2021 Projects
            </a>
        </li>
        <li>
            <a href="">
                Students
            </a>
        </li>
        <li>
            <a href="">
                Virtual Exhibition
            </a>
        </li>
    </ul>
    <ul class="navbar-items right">
        @auth
        <li>
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
    </ul>
</nav>
