<div class="screen-block scroll-anchor">
    <img class="wave-top" src="{{ asset('/images/wave_top.svg') }}" alt="wave">
</div>
<footer class="footer">
    <div class="footer-left">
        <div class="footer-links">
            <a href="{{ url('/') }}">
                Home
            </a>
            <a href="{{ url('/about') }}">
                About
            </a>
            <a href="{{ url('/projects') }}">
                Projects
            </a>
            <a href="{{ url('/students') }}">
                Students
            </a>
            @if(Options::get('student-login'))
                @auth
                    <a href="{{ url('/logout') }}">
                        Logout
                    </a>
                @else
                    <a href="{{ url('/login') }}">
                        Student Login
                    </a>
                @endauth
            @endif
        </div>
        <div class="footer-links">
            <a href="mailto:info@transmediawinchester.co.uk">
                Contact Us
            </a>
            <div class="with-header">
                <a href="mailto:info@transmediawinchester.co.uk">info@transmediawinchester.co.uk</a>
            </div>
        </div>
    </div>
    <div class="footer-right">
        <mail-form api-url="{{ route('newsletter.subscribe') }}"></mail-form>
    </div>
    <div class="copyright">
        © Transmedia Winchester {{ date('Y') }}
        <a target="_blank" href="https://redsquirrel.studio">Crafted By Red Squirrel Studio</a>
    </div>
</footer>
