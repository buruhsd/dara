<html>
	<head>
		<title>@yield('title') | CariKerja.co</title>
		<link rel="stylesheet" href="{{asset('packages/uikit/css/uikit.almost-flat.min.css')}}"/>
		<script  src="{{asset('packages/jquery/jquery.min.js')}}'"></script>
		<script  src="{{asset('packages/uikit/js/uikit.min.js')}}'"></script>
	</head>
	<body>
		<div class="uk-container uk-container-center uk-margin-top">
			<nav class="uk-navbar">
				<a href="#" class="uk-navbar-brand uk-hidden-small">Carikerja</a>
				<ul class="uk-navbar-nav uk-hidden-small">
					@if (Sentry::getUser()->hasPermission('reguler'))
                    @include('dashboard.navigasi.reguler')
                @endif

                @if (Sentry::getUser()->hasPermission('admin'))
                    @include('dashboard.navigasi.admin')
                @endif
				</ul>
				<div class="uk-navbar-flip uk-navbar-content">
					<a href="#">{{Sentry::getUser()->first_name .' '. Sentry::getUser()->last_name}}</a>
					<a href="{{URL::to('logout') }}">Logout</a>
				</div>
				<div class="uk-navbar-brand uk-navbar-center uk-visible-small">Carikerja</div>
			</nav>
			<div class="uk-container-center uk-margin-top">
				@include('tampil.partial.alert')
				<ul class="uk-breadcumb">
					@yield('breadcumb')
				</ul>
				<h1 class="uk-heading-large">@yield('title')</h1>
				@yield('content')
			</div>
		</div>
	</body>
</html>