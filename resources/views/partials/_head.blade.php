
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>Beauty Blog @yield('title')</title><!--Change this title for each page --!>

    <!-- Bootstrap -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

    <!-- Stylesheets -->
    {{Html::style('css/style.css')}}
    {{Html::style('css/menu.css')}}

    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
    <script type="text/javascript" src="//code.jquery.com/jquery-2.2.1.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.3.2/jquery.min.js" type="text/javascript"></script>

    <script type="text/javascript" src=" {{ URL::asset('js/jquery.easing.1.3.js') }}"></script>

    <link rel="stylesheet" href="{{ URL::asset('css/styleCarousel.css') }}" type="text/css" />

    <script type="text/javascript" src="{{ URL::asset('js/style.js') }}"></script>
    <script type="text/javascript" src="{{ URL::asset('js/menu.js') }}"></script>
    <script type="text/javascript" src="{{ URL::asset('js/carousel.js') }}"></script>

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>