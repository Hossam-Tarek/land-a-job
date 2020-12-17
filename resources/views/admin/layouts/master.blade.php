<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('title')</title>
    <link rel="stylesheet" href="{{ asset('css/fontaswesme-all.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <link rel="stylesheet" href="{{ asset('css/admin/main.css') }}">
    @yield('css')
</head>

<body>
    @include('admin.includes.header')
    <i class="fas fa-bars text-white sidebar-button"></i>
    @include('admin.includes.sidebar')
    <div class="container-fluid content m-0 p-0">
        <div class="row m-0 p-0">
            <div class="col-12 mt-5 p-0">
                @yield('content')
            </div>
        </div>
    </div>
    @include('admin.includes.footer')
    <script src="{{ asset('js/app.js') }}"></script>
    <script src="{{ asset('js/jquery-3.5.1.min.js') }}"></script>
    <script src="{{ asset('js/admin/main.js') }}"></script>
    @yield('script')
</body>

</html>
