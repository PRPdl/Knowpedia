<!DOCTYPE html>
<html>
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
@yield('head')


<!--[if IE 6]><link href="default_ie6.css" rel="stylesheet" type="text/css" /><![endif]-->
    <script src="{{ asset('/js/app.js') }}"></script>
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

                    <li>
                        <div class="dropdown dropdown-menu-right">
                        <button class="btn btn-sm btn-link mt-1" type="button" id="dropNotification" data-toggle="dropdown" onclick="fetchNotifications();">

                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="orange" class="bi bi-bell-fill" viewBox="0 0 16 16">
                                    <path d="M8 16a2 2 0 0 0 2-2H6a2 2 0 0 0 2 2zm.995-14.901a1 1 0 1 0-1.99 0A5.002 5.002 0 0 0 3 6c0 1.098-.5 6-2 7h14c-1.5-1-2-5.902-2-7 0-2.42-1.72-4.44-4.005-4.901z"/>
                                </svg>
                        </button>
                            <div class="dropdown-menu dropdown-menu-right bg-dark" aria-labelledby="dropNotification">
                                <a class="dropdown-item text-sm-left text-primary" href="{{ route('notification.show') }}" id="notification"></a>
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item text-sm-left text-info" href="{{ route('payment.store') }}">Make Payment</a>
                            </div>
                        </div>
                    </li>

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
	<p>&copy; AusLand. All rights reserved. | Photos by <a target="_blank" rel="noopener noreferrer" href="https://picsum.photos/">Lorem Picsum</a> | Design by <a href="#" rel="nofollow">Knowpedia</a>.</p>
</div>

</body>

</html>

