@foreach ($trends as $trend)
	<div class="trend">
		<div id="content">
			<div id="user-info">
				<img src="{{ 'http://www.gravatar.com/avatar/' . md5(strtolower(trim(Auth::user()->email))) . '?s=100&amp;d=identicon' }}" width="50px" height="50px" style="border-radius: 100%;"/>
				<p id="editor">{{ $trend->agent }}</p>
			</div>
			<div id="words">
				<p id="event">{{ $trend->behaviour }}</p>
				<a href="{{ route('entries.show', explode(':', $trend->theme)[0]) }}"><p id="item">{{ $trend->theme }}</p></a>
			</div>
			<p id="timestamp">{{ $trend->updated_at->diffForHumans() }}</p>
		</div>
		@if ($trend->operation == 'lookup')
			<a href="{{ route('entries.show', explode(':', $trend->theme)[0]) }}"><button id="look-up">查看</button></a>
		@else
			<form onsubmit="return confirm('確認撤銷？');" method="POST" acction="{{ route('dashboard.restore') }}">
				{{ csrf_field() }}
				<input type="text" name="lex_id" value="{{ explode(':', $trend->theme)[0] }}" style="display: none;">
				<input type="text" name="trend_id" value="{{ $trend->id }}" style="display: none;">
				<button id="undo" type="submit">撤銷</button>
			</form>
		@endif
	</div>
@endforeach
{!! $trends->render() !!}
