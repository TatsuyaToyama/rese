<!DOCTYPE html>
<html lang="ja">

<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Contact Form</title>
  <link rel="stylesheet" href="{{ asset('css/sanitize.css') }}" />
  <link rel="stylesheet" href="{{ asset('css/common.css') }}" />
  @yield('css')
</head>

<body>
  <header class="header">
    <a href="/menu">≡</a>
    <p class="title">Rese</p>
    @yield('header')
  </header>

  <main class="main">
    @yield('content')
  </main>
</body>

<footer class="footer">
    <p class="footer_contents">Atte,inc.</p>
</footer>

</html>