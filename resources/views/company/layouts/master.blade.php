<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield("title")</title>

    <link rel="stylesheet" href="{{ asset('css/fontaswesme-all.min.css') }}">
    <link rel="stylesheet" href="{{ asset("css/app.css") }}">
    <link rel="stylesheet" href="{{ asset("css/company/main.css") }}">
    @yield("style-sheets")
</head>
<body>
    @include("company.includes.header")

    <div class="container">
        @yield("content")
    </div>

    <script src="{{ asset('js/app.js') }}"></script>
    <script src="{{ asset('js/jquery-3.5.1.min.js') }}"></script>
    <script src="{{ asset("js/company/main.js") }}"></script>
    @yield("scripts")
</body>
</html>
