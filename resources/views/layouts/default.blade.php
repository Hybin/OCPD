<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <title>@yield('title', '首頁') - 上古擬音查詢系統</title>
    <link rel="stylesheet" href="/css/app.css">
    <script src="/js/app.js"></script>
</head>
<body>
    <header class="navbar">
        <img id="logo" src="{{ asset('/images/logo-black.png') }}">
        <h4>上古擬音查詢系統</h4>
        <div class="options">
            <a id="advanced-search">高級搜索</a>
			@if (Auth::check())
				<div class="user-badget">
					@if (Auth::user()->position == 'admin-kannrimono-guanliyuan')
						<a href="{{ route('users.index') }}"><p>✻ {{ Auth::user()->name }}</p></a>
					@else
						<p>✻ {{ Auth::user()->name }}</p>
					@endif
					<form action="{{ route('logout') }}" method="POST">
						{{ csrf_field() }}
						{{ method_field('DELETE') }}
						<input type="image" src="{{ asset('/images/logout.png') }}" width="25px" height="25px" alt="submit" />
					</form>
				</div>
			@else
				<div class="entrance">
					<a href="{{ route('signup') }}" id="signup">註冊</a>
					<a href="{{ route('login') }}" id="signin">登錄</a>
				</div>
			@endif
        </div>
    </header>

    <div class="main-page">
        @yield('content')
    </div>

    <footer>
        <p id="copyright">Powered by <a href="https://laravel.com"  target="_blank">Laravel</a> © <a href="http://ccl.pku.edu.cn/" title="北京大学中国语言学研究中心" target="_blank">CCL</a> of <a href="http://www.pku.edu.cn/" title="北京大学" target="_blank">Peking University</a> 2018</p>
    </footer>
</body>
</html>
