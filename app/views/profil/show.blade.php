@extends('tampil.master')
@section('title')
{{title}}
@stop

@section('breadcumb')
	<li><a href="/">Dashboard</a></li>
	<li class="uk-active">{{title}}</li>
@stop
@section('content')
	<table class="uk-table">
		<body>
			<tr>
				<td class="uk-text-muted">Nama</td>
				<td>{{$user->first_name.' '.$user->last_name}}</td>
				<td class="uk-text-muted">Email</td>
				<td>{{$user->email}}</td>
				<td class="uk=text-muted">Login Terakhir</td>
				<td>{{$user->last_login}}</td>
			</tr>
		</body>
	</table>
@stop