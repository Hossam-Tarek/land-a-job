<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield("title")</title>

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <link rel="stylesheet" href="{{ asset('css/fontaswesme-all.min.css') }}">
    <link rel="stylesheet" href="{{ asset("css/app.css") }}">
    <link rel="stylesheet" href="{{ asset("css/user/main.css") }}">
    @yield("style-sheets")
</head>
<body>
<div id="page-container">
    @auth
        @include("user.includes.header")
    @endauth
    <div id="content-wrap">
        @yield("content")
    </div>
    @include("user.includes.footer")
</div>

<script src="{{ asset('js/app.js') }}"></script>
<script src="{{ asset('js/jquery-3.5.1.min.js') }}"></script>
<script src="{{ asset("js/company/main.js") }}"></script>
@yield("scripts")
</body>
</html>
