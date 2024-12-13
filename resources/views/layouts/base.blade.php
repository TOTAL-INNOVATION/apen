<!DOCTYPE html>
<html lang="{{ config("app.locale") }}">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<link rel="shortcut icon" href="{{ asset('favicon.ico') }}" type="image/ico">
	@yield('metadata')
	@vite('resources/css/app.css')
</head>
<body>
	@yield('content')

    @vite('resources/ts/main.ts')
</body>
</html>