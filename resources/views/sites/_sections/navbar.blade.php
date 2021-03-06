<nav id="navbar" class="navbar navbar-default">
    <div class="container-fluid">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a href="{{ route('sites.home.index') }}" class="navbar-brand">
                {{ config('app.name') }}
            </a>
        </div>

        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
            <ul class="nav navbar-nav navbar-right">
                <li class="{{ Route::currentRouteName() === 'sites.posts.index' ? 'active' : '' }}">
                    <a href="{{ route('sites.posts.index') }}" title="{{ trans('view.posts') }}">
                        {{ trans('view.posts') }}
                    </a>
                </li>
                <li class="{{ Route::currentRouteName() === 'sites.users.index' ? 'active' : '' }}">
                    <a href="{{ route('sites.users.index') }}" title="{{ trans('view.authors') }}">
                        {{ trans('view.authors') }}
                    </a>
                </li>
                <li class="{{ Route::currentRouteName() === 'sites.tags.index' ? 'active' : '' }}">
                    <a href="{{ route('sites.tags.index') }}" title="{{ trans('view.tags') }}">
                        {{ trans('view.tags') }}
                    </a>
                </li>
                <li class="dropdown notifications">
                    <a href="javascript:void(0)" class="dropdown-toggle text-primary" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
                        <span class="fa fa-globe"></span>
                        <span class="badge">5</span>
                    </a>

                    <ul class="dropdown-menu">
                        <li>
                            <a href="#">
                                someome alreay follow you.
                            </a>
                        </li>
                    </ul>
                </li>
                @guest
                    <li>
                        <a href="{{ route('auth.login.index') }}" title="{{ trans('view.login') }}">
                            {{ trans('view.login') }}
                        </a>
                    </li>
                @else
                    <li class="dropdown">
                        <a href="javascript:void(0)" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
                            {{ Html::image(Auth::user()->avatar_path, Auth::user()->fullname, ['class' => 'user-avatar']) }}
                        </a>
                        <ul class="dropdown-menu">
                            @if (Auth::user()->canAccessAdminPages())
                                <li>
                                    <a href="{{ route('admin.dashboard.index') }}" title="{{ trans('view.dashboard') }}">
                                        {{ trans('view.dashboard') }}
                                    </a>
                                </li>
                            @endif
                            <li>
                                <a href="{{ route('sites.users.show', Auth::user()->username) }}" title="{{ trans('view.profile') }}">
                                    {{ trans('view.profile') }}
                                </a>
                            </li>
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
        </div>
    </div>
</nav>
