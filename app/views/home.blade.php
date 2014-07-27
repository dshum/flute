@extends('layout')

@section('title', 'Flutta')

@section('content')
<h1>Flutta</h1>
@foreach ($categoryList as $category)
<div class="category-row">
<div class="category"><span>{{ $category->name }}</span></div>
	@foreach ($cardList as $card)
		@if ($card->category_id != $category->id){? continue; ?}@endif
		@if (isset($redMap[$card->id])){? continue; ?}@endif
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
	@if (isset($blueMap[$category->id]))
<div class="blue">
		@foreach ($blueMap[$category->id] as $date)
<a href="{{ URL::route('archive') }}"><div>{{ $date->format('d.m.Y') }}</div></a>
		@endforeach
</div>
<br clear="both" />
	@endif
</div>
<br clear="both" />
@endforeach
@stop