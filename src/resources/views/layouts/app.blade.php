<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @yield('title')
    <link rel="stylesheet" href="{{ asset('css/sanitize.css') }}">
    <link rel="stylesheet" href="{{ asset('css/common.css') }}">
    @yield('css')
</head>

<body>
    <header class="header">
        <div class="header__inner">
            <div class="header__ttl"><a href="/">Todo</a></div>
            <nav class="header__nav"><a href="/categories">カテゴリ一覧</a></nav>
        </div>
    </header>
    <main class="main-contents">
       @yield('content')
    </main>
</body>

</html>