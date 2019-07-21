<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}" class="font-sans" style="background-color: #f5f5f5">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Administration Area</title>

    <script src="{{ asset('js/admin.js') }}" defer></script>

    <link href="https://fonts.googleapis.com/css?family=Lato:100,300,400,700,900" rel="stylesheet">
    <link href="{{ asset('css/style.css') }}" rel="stylesheet">
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body>

<div id="app">

    <div class="has-background-dark">
        @include('admin.layouts.partials.navigationAdmin')
    </div>

    <div class="container">
        @include('layouts.partials.flash')
    </div>

    <div class="columns">
        <div class="column is-narrow">
            @include('admin.layouts.partials.aside')
        </div>
        <div class="column">
            @yield('content')
        </div>
    </div>

</div>

</body>
</html>
