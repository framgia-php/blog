<aside class="main-sidebar">
    <section class="sidebar">
        <div class="user-panel">
            <div class="pull-left image">
                {{ Html::image(Auth::user()->avatar_path, Auth::user()->fullname, ['class' => 'img-circle']) }}
            </div>
            <div class="pull-left info">
                <p>{{ Auth::user()->fullname }}</p>
                <a href="#">
                    <i class="fa fa-circle text-success"></i> Online
                </a>
            </div>
        </div>
        <form action="{{ route('admin.posts.index') }}" method="get" class="sidebar-form">
            <div class="input-group">
                <input type="text"
                    name="keyword"
                    class="form-control"
                    placeholder="{{ trans('view.search') }}...">
                <span class="input-group-btn">
                    <button type="submit" id="search-btn" class="btn btn-flat">
                        <i class="fa fa-search"></i>
                    </button>
                </span>
            </div>
        </form>
        <ul class="sidebar-menu">
            <li class="{{ Route::currentRouteName() == 'admin.dashboard.index' ? 'active' : '' }}">
                <a href="{{ route('admin.dashboard.index') }}" title="{{ trans('view.dashboard') }}">
                    <i class="fa fa-dashboard"></i>
                    <span>{{ trans('view.dashboard') }}</span>
                </a>
            </li>
            @can('view', \App\Models\Category::class)
                <li class="{{ Route::currentRouteName() == 'admin.categories.index' ? 'active' : '' }}">
                    <a href="{{ route('admin.categories.index') }}" title="{{ trans('view.manage_categories')}}">
                        <i class="fa fa-cubes"></i>
                        <span>{{ trans('view.manage_categories') }}</span>
                    </a>
                </li>
            @endcan
            @can('view', \App\Models\Tag::class)
                <li class="{{ Route::currentRouteName() == 'admin.tags.index' ? 'active' : '' }}">
                    <a href="{{ route('admin.tags.index') }}" title="{{ trans('view.manage_tags')}}">
                        <i class="fa fa-cubes"></i>
                        <span>{{ trans('view.manage_tags') }}</span>
                    </a>
                </li>
            @endcan
            @can('view', \App\Models\Post::class)
                <li class="{{ Route::currentRouteName() == 'admin.posts.index' ? 'active' : '' }}">
                    <a href="{{ route('admin.posts.index') }}" title="{{ trans('view.manage_posts')}}">
                        <i class="fa fa-cubes"></i>
                        <span>{{ trans('view.manage_posts') }}</span>
                    </a>
                </li>
            @endcan
            @can('view', \App\Models\User::class)
                <li class="{{ Route::currentRouteName() == 'admin.users.index' ? 'active' : '' }}">
                    <a href="{{ route('admin.users.index') }}" title="{{ trans('view.manage_users')}}">
                        <i class="fa fa-cubes"></i>
                        <span>{{ trans('view.manage_users') }}</span>
                    </a>
                </li>
            @endcan
            @can('view', \App\Models\Role::class)
            <li class="{{ Route::currentRouteName() == 'admin.roles.index' ? 'active' : '' }}">
                <a href="{{ route('admin.roles.index') }}" title="{{ trans('view.manage_roles')}}">
                    <i class="fa fa-cubes"></i>
                    <span>{{ trans('view.manage_roles') }}</span>
                </a>
            </li>
            @endcan
        </ul>
    </section>
</aside>
