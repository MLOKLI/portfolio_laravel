<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	
	<meta name="description" content="Личное портфолио Петрова Александра Андреевича">
    <meta name="author" content="Петров Александр (mlokli)">
    <meta name="generator" content="Jekyll v4.1.1">
	
	<!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
	
    <title>{{ config('app.name', 'Laravel') }}</title>
	
	<link rel="canonical" href="(link)/index">
	
	<!-- Scripts -->
    
    <!-- Bootstrap core CSS -->
	<link href="{{ asset('assets/css/bootstrap.css') }}" rel="stylesheet">

    <style>
		.bd-placeholder-img {
			font-size: 1.125rem;
			text-anchor: middle;
			-webkit-user-select: none;
			-moz-user-select: none;
			-ms-user-select: none;
			user-select: none;
		}
		
		@media (min-width: 768px) {
			.bd-placeholder-img-lg {
				font-size: 3.5rem;
			}
		}
	</style>
	
    <!-- Custom styles for this template -->
    <link href="{{ asset('assets/css/album.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/css/index.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/css/log-list.css') }}" rel="stylesheet">
	
	<!-- Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Press+Start+2P&display=swap" rel="stylesheet">
</head>
<body>
	<header>
		<div class="collapse bg-dark" id="navbarHeader">
			<div class="container">
				<div class="row">
					<div class="col-sm-8 col-md-7 py-4">
						<h4 class="text-white">Обо мне</h4>
						<p class="text-muted">Информация обо мне. Но что тут писать я хз.</p>
					</div>
					<div class="col-sm-4 offset-md-1 py-4">
						<h4 class="text-white">Контакты</h4>
						<ul class="list-unstyled">
							<li><a href="https://vk.com/mlokli" class="text-white">ВКонтакте</a></li>
							<li><a href="https://www.instagram.com/mlokli" class="text-white">Instagram</a></li>
							<li><a href="https://telegram.me/mlokli" class="text-white">Telegram</a></li>
							<li><a href="mailto:petrov.alexandr.1997@gmail.com" class="text-white">petrov.alexandr.1997@gmail.com</a></li>
							<li><a href="tel:+375292966787" class="text-white">+375 (29) 296-67-87</a></li>
						</ul>
					</div>
				</div>
			</div>
		</div>
		<div class="navbar navbar-dark bg-dark shadow-sm">
			<div class="container d-flex justify-content-between">
				<a href="{{ url('/') }}" class="navbar-brand d-flex align-items-center">
					<svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-code mr-2" fill="currentColor" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M5.854 4.146a.5.5 0 0 1 0 .708L2.707 8l3.147 3.146a.5.5 0 0 1-.708.708l-3.5-3.5a.5.5 0 0 1 0-.708l3.5-3.5a.5.5 0 0 1 .708 0zm4.292 0a.5.5 0 0 0 0 .708L13.293 8l-3.147 3.146a.5.5 0 0 0 .708.708l3.5-3.5a.5.5 0 0 0 0-.708l-3.5-3.5a.5.5 0 0 0-.708 0z"/></svg>
					<strong>{{ config('app.name', 'Laravel') }}</strong>
				</a>
				<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarHeader" aria-controls="navbarHeader" aria-expanded="false" aria-label="Toggle navigation">
					<span class="navbar-toggler-icon"></span>
				</button>
			</div>
		</div>
	</header>
	
	<main role="main">
		<section class="jumbotron text-center">
			<div class="container">
				<h1>Петров Александр Андреевич</h1>
				<p class="lead text-muted" style="font-family:'Press Start 2P',cursive;font-size:10px;">С Front-end все плохо. Мне нравится Back-end.<span style="display: block;">И сдесь вы сможите посмотреть что я сделал :)</span></p>
			</div>
		</section>
		
		@yield('content')
	</main>
	
	<footer class="text-muted">
		<div class="container">
			<p class="float-right"><a href="#">Вверх</a></p>
			<p>Пример альбома &copy; Bootstrap, настроеный под себя.</p>
		</div>
	</footer>
	
	<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
	<script src="{{ asset('assets/js/bootstrap.bundle.js') }}"></script>
</body>
</html>