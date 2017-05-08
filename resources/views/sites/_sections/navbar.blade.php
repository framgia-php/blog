<nav id="navbar" class="navbar navbar-default">
    <div class="container-fluid">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            {{ link_to_route('sites.home.index', config('app.name'), [], ['class' => 'navbar-brand']) }}
        </div>

        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
            <ul class="nav navbar-nav navbar-right">
                @guest
                    <li>
                        {{ link_to_route('auth.login.index', trans('view.login')) }}
                    </li>
                @else
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
                            {{ Auth::user()->fullname }} <span class="caret"></span>
                        </a>
                        <ul class="dropdown-menu">
                            <li role="separator" class="divider"></li>
                            <li>
                                {{ Form::open(['route' => 'auth.login.logout', 'method' => 'delete']) }}
                                    {{ Form::submit(trans('view.logout'), [
                                        'title' => trans('view.logout'),
                                        'class' => 'btn btn-link',
                                    ]) }}
                                {{ Form::close() }}
                            </li>
                        </ul>
                    </li>
                @endguest
            </ul>

            <form class="navbar-form navbar-right">
                <div class="form-group">
                    <input type="text" class="form-control" placeholder="Search">
                </div>
            </form>
        </div>
    </div>
</nav>
