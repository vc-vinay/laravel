<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }} - @yield('title')</title>
    @include('admin/panel/layouts/partials/css')
</head>

<body class="sb-nav-fixed">
    @include('admin/panel/layouts/partials/header')
    <div id="layoutSidenav">
        <div id="layoutSidenav_nav">
            @include('admin/panel/layouts/partials/menu_nav')
        </div>

        <div id="layoutSidenav_content">
            <main>
                <div class="content-wrapper" style="padding-top: 0px; padding-bottom: 0px">
                    <div class="row">
                        <div class="col-md-12">
                            @include('admin.panel.layouts..partials.flash-message')
                        </div>
                    </div>
                </div>
                <div class="container-fluid">
                    @yield('content')
                </div>
            </main>
            @include('admin/panel/layouts/partials/footer')
        </div>
    </div>
    @include('admin/panel/layouts/partials/scripts')
    @include('admin.panel.layouts.partials.sweet-alert')
    {{-- @include('sweetalert::alert', ['cdn' => "https://cdn.jsdelivr.net/npm/sweetalert2@9"]) --}}
    <!-- https://cdn.jsdelivr.net/npm/sweetalert2@10.3.5/dist/sweetalert2.all.min.js -->
    @stack('scripts')
</body>

</html>