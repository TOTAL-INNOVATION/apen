<!DOCTYPE html>
<html lang="{{ config('app.locale') }}">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<link rel="shortcut icon" href="{{ asset('favicon.ico') }}" type="image/ico">
	<title>{{ $title }} | {{ config('app.name') }}</title>
    {{ $metadata }}
	@vite('resources/css/app.css')
</head>
<body>
    
	<div class="min-h-screen">
		
		<main class="py-4 mb-4 sm:mb-6 lg:mb-8">

			<div class="container">
				
				<div class="my-4 sm:my-6 w-full inline-flex justify-center">
					<img src="{{ asset('logo.png') }}" class="w-20 sm:w-24 md:w-28" alt="{{ config('app.name') }}">
				</div>
				{{ $slot }}

			</div>
		</main>

    	<x-footer />
	</div>

    @vite('resources/ts/main.ts')
</body>
</html>
