@extends('layout')

@section('header')
<div id="header-featured">
		<div id="banner-wrapper">
			<div id="banner" class="container1">
				<h2>Maecenas luctus lectus</h2>
				<p><strong>Knowpedia</strong>, is a free online encyclopedia, created and edited by volunteers around the world and hosted by the Knowpedia Foundation. Designed by <a href="#" rel="nofollow">Knowpedia</a>. The photos in the page are from <a href="http://lorempicsum.com/"> Lorem Picsum</a></p>


            @auth
                    <a href="#" class="button">
                        Welcome Mr {{ Auth::user()->name}}
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
