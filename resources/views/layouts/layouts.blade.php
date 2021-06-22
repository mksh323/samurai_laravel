<html>
    <head>
        <title>@yield('title')</title>
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <link href="{{ asset('css/app.css') }}" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">

        <!-- Styles -->

        <link rel='stylesheet' href="{{asset('/css/main.css')}}">
        <link rel="stylesheet" type="text/css" href="{{ asset('/css/style.css') }}">
        <script src="{{asset('js/main.js')}}"></script>
        <script
            src="https://code.jquery.com/jquery-3.6.0.min.js"
            integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4="
            crossorigin="anonymous">
        </script>
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <script
            src="https://code.jquery.com/jquery-3.6.0.min.js"
            integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4="
            crossorigin="anonymous"></script>
        <link rel="create_event" href="create_event.scss">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/material-design-iconic-font/2.2.0/css/material-design-iconic-font.min.css">
    </head>
    <body>
        <script　src="{{ asset('/js/calendar.js') }}"></script>
        @component('components.header')
        @endcomponent
        <div class="container">
        <div class="row">
        <div class="col-2">
        <div class="sidebar">
        @yield('add')
        </div>
        </div>
        <div class="col">
        @yield('content')
        </div>
        </div>
        </div>
        @component('components.footer')
        @endcomponent
         <script src="{{ asset('js/app.js') }}"></script>
    </body>
</html> 