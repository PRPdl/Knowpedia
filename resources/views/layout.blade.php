<!DOCTYPE html>

<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title></title>
<meta name="keywords" content="" />
<meta name="description" content="" />
<link href="http://fonts.googleapis.com/css?family=Source+Sans+Pro:200,300,400,600,700,900" rel="stylesheet" />
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
<link href="/css/default.css" rel="stylesheet"/>
<link href="/css/fonts.css" rel="stylesheet"/>
@yield('head')



<!--[if IE 6]><link href="default_ie6.css" rel="stylesheet" type="text/css" /><![endif]-->

</head>
<body>
<div id="header-wrapper">
	<div id="header" class="container1">
		<div id="logo">
			<h1><a href="/">{{ env("APP_NAME") }}</a></h1>
		</div>
		<div id="menu">
			<ul>
				<li class="{{ Request::path() === '/' ? 'current_page_item' : ''}}"><a href="/" accesskey="1" title="">Homepage</a></li>
				<li class="{{ Request::path() === 'articles/create' ? 'current_page_item' : ''}}"><a href="{{ route('articles.create') }}" accesskey="2" title="">New Article</a></li>
				<li class="{{ Request::path() === 'about' ? 'current_page_item' : ''}}"><a href="/about" accesskey="3" title="">About Us</a></li>
				<li class="{{ Request::path() === 'articles' ? 'current_page_item' : ''}}"><a href="{{route('articles')}}" accesskey="4" title="">Articles</a></li>
				<li class="{{ Request::path() === 'contact' ? 'current_page_item' : ''}}"><a href="{{ route('contact.show') }}" accesskey="5" title="">Contact Us</a></li>
                @guest()
                    <li class="{{ Request::path() === 'login' ? 'current_page_item' : ''}}"><a href="{{ route('login') }}" accesskey="6" title="">Login</a></li>
                @else
                    <li><a href="#" onclick="document.getElementById('logout').submit();">Logout</a></li>
                @endguest
            </ul>
            <form id="logout" action="/logout" method="POST">
                @csrf
                <input type="hidden" name="mess">
            </form>
		</div>
	</div>
@yield('header')
</div>

@yield('content')

<div id="copyright" class="container">
	<p>&copy; Untitled. All rights reserved. | Photos by <a href="http://fotogrph.com/">Photograph</a> | Design by <a href="http://templated.co" rel="nofollow">TEMPLATED</a>.</p>
</div>

</body>

