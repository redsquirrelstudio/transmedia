<div class="screen-block scroll-anchor">
    <img class="wave-top" src="{{ asset('/images/wave_top.svg') }}" alt="wave">
</div>
<footer class="footer">
    <div class="footer-left">
        <div class="footer-links">
            <a href="{{ url('/') }}">
                Home
            </a>
            <a href="">
                About
            </a>
            <a href="">
                Projects
            </a>
            <a href="">
                Students
            </a>
            <a href="">
                MERCHANDISE
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
            <a href="">
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
        <a href="https://redsquirrel.studio">Crafted By Red Squirrel Studio</a>
    </div>
</footer>
