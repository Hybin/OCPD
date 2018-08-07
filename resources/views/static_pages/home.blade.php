@extends('layouts.default')
@section('title', '首页')

@section('content')
<div class="jumbotron">
    <div class="slogan">
        <img src="{{ asset('/images/deer.png') }}" id="slogan-img">
        <p>What does /the Ancient Chinese/ say?</p>
    </div>
    <form action="GET" id="simple-search">
        <input type="text" name="keyword" id="search-bar" placeholder="输入汉字进行查询">
        <button type="submit" id="submit">搜 索</button>
    </form>
</div>
@stop