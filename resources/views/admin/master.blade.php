<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    @if (session('status') === 'success')
        <meta name="status" content="success" />
        <meta name="message" content="{{ session('message') }}" />
    @elseif (session('status') === 'failure')
        <meta name="status" content="failure" />
        <meta name="error" content="{{ session('error') }}"/>
    @endif

    <title>{{ config('app.name') }} | @yield('title')</title>

    {{ Html::style(elixir('css/admin.min.css')) }}

    @stack('styles')
</head>
<body class="hold-transition skin-blue sidebar-mini">
    <div class="wrapper">
        @include('admin._sections.header')

        @include('admin._sections.sidebar')

        <div class="content-wrapper">
            @yield('heading')

            <section class="content">
                @yield('content')
            </section>
        </div>

        @include('admin._sections.footer')
    </div>

    {{ Html::script(elixir('js/admin.min.js')) }}

    @stack('scripts')
</body>
</html>
