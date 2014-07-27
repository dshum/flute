@extends('layout')

@section('title', 'Flutta | Archive')

@section('content')
<h1><a href="{{ URL::route('home') }}">Flutta</a></h1> <h2>Archive</h2>
@if (sizeof($blueMap))
	@foreach ($blueMap as $k => $info)
		{? list($date, $category) = $info; ?}
<div class="category-row">
<div class="category"><span>{{ $category->name }}</span></div>
		@foreach ($redMap[$k] as $card)
<div class="card">
			@if ($card->mark_id == Mark::YELLOW_MARK_ID)
@if ($isLogged)<a href="{{ URL::route('set', array('red', $card->id)) }}" card="{{ $card->name }}">@endif<div class="mark yellow">{{ $card->date_yellow->format('d.m.Y') }}</div>@if ($isLogged)</a>@endif
			@elseif ($card->mark_id == Mark::RED_MARK_ID)
@if ($isLogged)<a href="{{ URL::route('set', array('empty', $card->id)) }}" card="{{ $card->name }}">@endif<div class="mark red">{{ $card->date_red->format('d.m.Y') }}</div>@if ($isLogged)</a>@endif
			@else
@if ($isLogged)<a href="{{ URL::route('set', array('yellow', $card->id)) }}" card="{{ $card->name }}">@endif<div class="mark empty">{{ $card->created_at->format('d.m.Y') }}</div>@if ($isLogged)</a>@endif
			@endif
{{ $card->name }}<br>
@if ($card->mark_id == Mark::RED_MARK_ID)<div class="date"><span class="yellow">{{ $card->date_yellow->format('d.m.Y') }}</span></div>@endif
@if ($card->mark_id)<div class="date"><span class="empty">{{ $card->created_at->format('d.m.Y') }}</span></div>@endif
</div>
		@endforeach
<div class="blue">
<div>{{ $date->format('d.m.Y') }}</div>
</div>
<br clear="both" />
</div>
<br clear="both" />
	@endforeach
@else
<p class="archive">
(\__/)<br>
(='.'=)<br>
(")_(")<br>
</p>
@endif
@stop