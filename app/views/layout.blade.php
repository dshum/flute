<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<title>@yield('title')</title>
<link rel="shortcut icon" href="{{ asset('favicon.ico') }}" type="image/x-icon">
{{ HTML::style('f/default.css') }}
{{ HTML::script('f/jquery/jquery-1.8.2.js') }}
<script type="text/javascript">
$(function() {
	$('input[name="pass"]').focus(function() {
		if ($(this).val() == '******') {
			$(this).val('').css({color: '#000'});
		}
	}).blur(function() {
		if ($(this).val() == '') {
			$(this).val('******').css({color: '#999'});
		}
	}).val('******');

	$('div.card a').click(function () {
		var title = $(this).attr('card');
		return confirm('Изменить оценку "'+title+'"?')
	});
});
</script>
<body class="site" id="fp">
@yield('content')
{? $site = App::make('site') ?}
{? $queries = DB::getQueryLog() ?}
<ol>
@foreach ($queries as $query)
<li>{{ $query['time'] / 1000 }} sec. {{ $query['query'] }}</li>
@endforeach
</ol>
<p>Totally: {{ $site->getMicroTime() }} sec, {{ $site->getMemoryUsage() }} Mb</p>
<div class="footer">
@if ($isLogged)
<a href="{{ URL::route('logout') }}">Выход</a>
@else
{{ Form::open(array('route' => 'login', 'method' => 'post')) }}
{{ Form::password('pass') }}
{{ Form::close() }}
@endif
</div>
</body>
</html>