<aside class="main-sidebar">
    <section class="sidebar">
        <div class="user-panel">
            <div class="pull-left image">
                <img src="/img/user2-160x160.jpg" class="img-circle" alt="User Image">
            </div>
            <div class="pull-left info">
                <p>{{ Auth::user()->fullname }}</p>
                <a href="#">
                    <i class="fa fa-circle text-success"></i> Online
                </a>
            </div>
        </div>
        <form action="#" method="get" class="sidebar-form">
            <div class="input-group">
                <input type="text" name="q" class="form-control" placeholder="Search...">
                <span class="input-group-btn">
                    <button type="submit" name="search" id="search-btn" class="btn btn-flat"><i class="fa fa-search"></i>
                    </button>
                </span>
            </div>
        </form>
        <ul class="sidebar-menu">
            <li>
                <a href="{{ route('admin.dashboard.index') }}" title="{{ trans('view.dashboard') }}">
                    <i class="fa fa-dashboard"></i>
                    <span>{{ trans('view.dashboard') }}</span>
                </a>
            </li>
            @can('view', \App\Models\Category::class)
                <li>
                    <a href="{{ route('admin.categories.index') }}" title="{{ trans('view.manage_categories')}}">
                        <i class="fa fa-cubes"></i>
                        <span>{{ trans('view.manage_categories') }}</span>
                    </a>
                </li>
            @endcan
            @can('view', \App\Models\Tag::class)
                <li>
                    <a href="{{ route('admin.tags.index') }}" title="{{ trans('view.manage_tags')}}">
                        <i class="fa fa-cubes"></i>
                        <span>{{ trans('view.manage_tags') }}</span>
                    </a>
                </li>
            @endcan
            @can('view', \App\Models\Post::class)
                <li>
                    <a href="{{ route('admin.posts.index') }}" title="{{ trans('view.manage_posts')}}">
                        <i class="fa fa-cubes"></i>
                        <span>{{ trans('view.manage_posts') }}</span>
                    </a>
                </li>
            @endcan
            @can('view', \App\Models\User::class)
                <li>
                    <a href="{{ route('admin.posts.index') }}" title="{{ trans('view.manage_posts')}}">
                        <i class="fa fa-cubes"></i>
                        <span>{{ trans('view.manage_users') }}</span>
                    </a>
                </li>
            @endcan
            @can('view', \App\Models\Role::class)
            <li>
                <a href="{{ route('admin.roles.index') }}" title="{{ trans('view.manage_roles')}}">
                    <i class="fa fa-cubes"></i>
                    <span>{{ trans('view.manage_roles') }}</span>
                </a>
            </li>
            @endcan
        </ul>
    </section>
</aside>
