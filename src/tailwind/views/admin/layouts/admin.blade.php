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

    <div class="flex">

        <div class="w-1/6">
            <aside>
                @include('admin.layouts.partials.aside')
            </aside>
        </div>

        <div class="w-full">
            <header>
                @include('admin.layouts.partials.navigationAdmin')
                @include('layouts.partials.flash')
            </header>
            <main class="p-6">
                <div class="bg-white shadow pb-6">
                    @yield('content')
                </div>
            </main>
        </div>

    </div>

</div>
</body>
</html>
