@extends('layouts.default')
@section('title', '错误')

@section('content')
<div class="jumbotron" style="height: 32em;">
    <div id="error-page">
		<img src="{{ asset('/images/bear.png') }}" id="error-img">
		<p id="error-msg">{{ $info or "我们好像走了一点弯路..." }}</p>
	</div>
</div>

<script>
    setTimeout(function(){
        window.location.href="{{$url or '/'}}";
    },3000)
</script>
@endsection