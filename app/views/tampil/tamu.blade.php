<html>
	<head>
		<title>Sistem Cari Kerja Onlne</title>
		<link rel="stylesheet" href="{{asset('packages/uikit/css/uikit.almost-flat.min.css')}}"/>
		<script src="{{ asset('packages/jquery/jquery.min.js' )}}"></script>
		<script src="{{ asset('packages/uikit/js/uikit.min.js' )}}"></script>
	</head>

	<body>
		<div class="uk-container uk-container-center uk-margin-top">
			<nav class="uk-navbar">
				<a href="#" class="uk-navbar-brand uk-hidden-small">CariKerja.co</a>
				<div class="uk-navbar-flip uk-navbar-content">
					<a class="" href="{{ URL::to('login') }}">Login</a> |
					<a class="" href="#">Daftar</a>
				</div>
				<div class="uk-navbar-brand uk-navbar-center uk-visible-small">CariKerja.co</div>
			</nav>
			<div class="uk-container-center uk-margin-top">
				@include('tampil.partial.alert')
				@yield('content')
			</div>
		</div>
	</body>