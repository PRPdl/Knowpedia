@extends('layout')

@section('header')
<div id="header-featured">
		<div id="banner-wrapper">
			<div id="banner" class="container1">
				<h2>Maecenas luctus lectus</h2>
				<p>This is <strong>SimpleWork</strong>, a free, fully standards-compliant CSS template designed by <a href="http://templated.co" rel="nofollow">TEMPLATED</a>. The photos in this template are from <a href="http://fotogrph.com/"> Fotogrph</a>. This free template is released under the <a href="http://templated.co/license">Creative Commons Attribution</a> license, so you're pretty much free to do whatever you want with it (even use it commercially) provided you give us credit for it. Have fun :) </p>

					@auth
                    <a href="#" class="button">
                        {{ Auth::user()->name}}
                    </a>
					@else
                    <a href="{{route('login')}}" class="button">
                      Please Log In
                    </a>
					@endauth
				 </div>
		</div>
    </div>
@endsection

{{--    <!doctype html>--}}
{{--<html lang="en">--}}
{{--<head>--}}
{{--    <meta charset="UTF-8">--}}
{{--    <meta name="viewport"--}}
{{--          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">--}}
{{--    <meta http-equiv="X-UA-Compatible" content="ie=edge">--}}
{{--    <link href="/css/app.css" rel="stylesheet">--}}
{{--    <title>Document</title>--}}
{{--</head>--}}
{{--<body>--}}
{{--    <div id="app">--}}
{{--        <example-component></example-component>--}}
{{--    </div>--}}
{{--</body>--}}
{{--<script src="{{ asset('/js/app.js') }}"></script>--}}
{{--</html>--}}
