<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <title>@yield('title', '首页') - 上古拟音查询系统</title>
    <link rel="stylesheet" href="/css/app.css">
    <script src="/js/app.js"></script>
</head>
<body>
    <header class="navbar">
        <img id="logo" src="{{ asset('/images/logo-black.png') }}">
        <h4>上古拟音查询系统</h4>
        <div class="options">
            <a id="advanced-search">高级搜索</a>
            <div class="entrance">
                <a id="signup">注册</a>
                <a id="signin">登陆</a>
            </div>
        </div>
    </header>

    <div class="main-page">
        @yield('content')
    </div>

    <footer>
        <p id="copyright">© <a href="http://ccl.pku.edu.cn/" title="北京大学中国语言学研究中心" target="_blank">CCL</a> of <a href="http://www.pku.edu.cn/" title="北京大学" target="_blank">Peking University</a> 2018</p>
    </footer>
</body>
</html>