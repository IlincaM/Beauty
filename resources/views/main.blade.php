<!DOCTYPE html>
<html lang="en">
    <head>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" media="screen" href="https://fontlibrary.org/face/rebecca" type="text/css"/

        @yield('stylesheets')

    </head>

    @include('partials._head')
    <body>

        @include('partials._messages')
        {{Auth::check() ? "Logged in": "Logged Out"}}

        @include('partials._nav')
        <div class="background-wrap">
            <video class="video-bg-elem1" preload="auto" autoplay="true" loop="loop" muted="muted">
                <source src="{{ URL::to('vid/background.mp4') }}" type="video/mp4">
                Video not supported
            </video>
        </div>


        @yield('content')






        @include('partials._footer')
        @include('partials._javascript')
        @yield('scripts')

    </body>
</html>