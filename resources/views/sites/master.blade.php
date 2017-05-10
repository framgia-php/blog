<!DOCTYPE HTML>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <meta name="csrf-token" content="{{ csrf_token() }}"/>

    <title>{{ config('app.name') }} | @yield('title')</title>

    {{ Html::style(elixir('css/sites.min.css')) }}

    @stack('styles')
</head>
<body>
    <div class="wrapper">
        @include('sites._sections.navbar')

        <div class="content">
            @yield('content')
        </div>

        @include('sites._sections.footer')
    </div>

    {{ Html::script(elixir('js/sites.min.js')) }}

    @stack('scripts')
</body>
</html>
