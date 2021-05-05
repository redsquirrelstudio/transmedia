<div class="sidebar">
    <nav class="sidebar-nav">
        <ul class="nav">
            <li class="nav-title">Site Links</li>
            <li class="nav-item"><a class="nav-link" href="{{ url('/') }}"><i class="nav-icon icon-screen-desktop"></i>
                    Home Page</a></li>

            <li class="nav-title">{{ trans('brackets/admin-ui::admin.sidebar.content') }}</li>
            <li class="nav-item"><a class="nav-link" href="{{ url('admin/users') }}"><i
                        class="nav-icon icon-people"></i> {{ trans('admin.user.title') }}</a></li>
            <li class="nav-item"><a class="nav-link" href="{{ url('admin/featured-projects') }}"><i
                        class="nav-icon icon-star"></i> {{ trans('admin.featured-project.title') }}</a></li>
            <li class="nav-item"><a class="nav-link" href="{{ url('admin/schedules') }}"><i class="nav-icon icon-calendar"></i> {{ trans('admin.schedule.title') }}</a></li>
           {{-- Do not delete me :) I'm used for auto-generation menu items --}}

            <li class="nav-title">{{ trans('brackets/admin-ui::admin.sidebar.settings') }}</li>
            <li class="nav-item"><a class="nav-link" href="{{ url('admin/admin-users') }}"><i
                        class="nav-icon icon-user"></i> {{ __('Manage access') }}</a></li>
            <li class="nav-item"><a class="nav-link" href="{{ url('admin/settings/toggle/show-live') }}">
                    @if(Options::get('show-live'))
                        <i style="color: #3ac25e;" class="nav-icon fa fa-toggle-on"></i>
                    @else
                        <i style="color: #cc3700;" class="nav-icon fa fa-toggle-off"></i>
                    @endif
                    Show Live Site
                </a>
            </li>
            <li class="nav-item"><a class="nav-link" href="{{ url('admin/settings/toggle/student-login') }}">
                    @if(Options::get('student-login'))
                        <i style="color: #3ac25e;" class="nav-icon fa fa-toggle-on"></i>
                    @else
                        <i style="color: #cc3700;" class="nav-icon fa fa-toggle-off"></i>
                    @endif
                    Student login
                </a>
            </li>
            <li class="nav-item"><a class="nav-link" href="{{ url('admin/settings/toggle/show-stream') }}">
                    @if(Options::get('show-stream'))
                        <i style="color: #3ac25e;" class="nav-icon fa fa-toggle-on"></i>
                    @else
                        <i style="color: #cc3700;" class="nav-icon fa fa-toggle-off"></i>
                    @endif
                    Show Live Stream
                </a>
            </li>
            <li class="nav-item"><a class="nav-link" href="{{ url('admin/settings/toggle/count-views') }}">
                    @if(Options::get('count-views'))
                        <i style="color: #3ac25e;" class="nav-icon fa fa-toggle-on"></i>
                    @else
                        <i style="color: #cc3700;" class="nav-icon fa fa-toggle-off"></i>
                    @endif
                    Count Views
                </a>
            </li>
            {{-- Do not delete me :) I'm also used for auto-generation menu items --}}
            {{--<li class="nav-item"><a class="nav-link" href="{{ url('admin/configuration') }}"><i class="nav-icon icon-settings"></i> {{ __('Configuration') }}</a></li>--}}
        </ul>
    </nav>
    <button class="sidebar-minimizer brand-minimizer" type="button"></button>
</div>
