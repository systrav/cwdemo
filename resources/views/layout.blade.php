<!doctype html>
<html lang="{{ App::getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" type="text/css" href="{{asset('css/pure-min.css')}}">
        <link rel="stylesheet" type="text/css" href="{{asset('css/jquery-ui.min.css')}}">
        <style>@yield('css')</style>
        <title>@yield('title')</title>
	</head>
	<body>
        <script type="text/javascript" src="{{asset('js/jquery.min.js')}}" charset="utf-8"></script>
        <script type="text/javascript" src="{{asset('js/jquery-ui.min.js')}}" charset="utf-8"></script>

		<main>
			@yield('content')
		</main>
	</body>
</html>