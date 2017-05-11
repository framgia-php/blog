<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name') }} | @yield('title')</title>

    {{ Html::style(elixir('css/admin.min.css')) }}
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

    <script type="text/javascript">
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        $(document).ready(function () {
            $(document).on('click', '.btn-delete-resource', function (e) {
                e.preventDefault();

                if (confirm('Do you want to delete?')) {
                    var route = $(this).attr('href');

                    $.post(route, { _method: 'delete' })
                        .done(function (response) {
                            window.location.reload();
                        });
                }
            });
        });
    </script>
</body>
</html>
