<!DOCTYPE html>
<html class="full" lang="en">
    <head>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" media="screen" href="https://fontlibrary.org/face/rebecca" type="text/css"/

              @yield('stylesheets')

    </head>

    @include('partials._head')
    <body>

        @include('partials._messages')
        @include('partials._nav')



<div class="container">
        @yield('content')
</div>





        @include('partials._footer')
        @include('partials._javascript')
        @yield('scripts')

    </body>
</html>