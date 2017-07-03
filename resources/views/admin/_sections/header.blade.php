<header class="main-header">
    <a href="/" class="logo">
        <span class="logo-mini">{{ trans('view.logo_mini') }}</span>
        <span class="logo-lg">{{ trans('view.logo_lg') }}</span>
    </a>

    <nav class="navbar navbar-static-top">
        <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
        </a>

        <div class="navbar-custom-menu">
            <ul class="nav navbar-nav">
                <li class="dropdown user user-menu">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                        <img src="/img/user2-160x160.jpg" class="user-image" alt="User Image">
                        <span class="hidden-xs">{{ Auth::user()->fullname }}</span>
                    </a>
                    <ul class="dropdown-menu">
                        <!-- User image -->
                        <li class="user-header">
                            <img src="/img/user2-160x160.jpg" class="img-circle" alt="User Image">
                            <p>
                                {{ Auth::user()->fullname }}
                            </p>
                        </li>
                        <!-- Menu Body -->
                        <li class="user-body">
                        </li>
                        <li class="user-footer">
                            <div class="pull-left">
                                <a href="{{ route('sites.users.show', ['username' => Auth::user()->username]) }}" class="btn btn-default btn-flat">
                                    {{ trans('view.profile') }}
                                </a>
                            </div>
                            <div class="pull-right">
                                {{ Form::open(['route' => 'auth.login.logout', 'method' => 'delete']) }}
                                    <button type="submit" class="btn btn-default btn-flat">
                                        {{ trans('view.logout') }}
                                    </button>
                                {{ Form::close() }}
                            </div>
                        </li>
                    </ul>
                </li>
                <li>
                    <a href="#" data-toggle="control-sidebar">
                        <i class="fa fa-gears"></i>
                    </a>
                </li>
            </ul>
        </div>
    </nav>
</header>
