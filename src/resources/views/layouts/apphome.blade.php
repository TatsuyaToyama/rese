<!DOCTYPE html>
<html lang="ja">

<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Rese</title>
  <link rel="stylesheet" href="{{ asset('css/sanitize.css') }}" />
  <link rel="stylesheet" href="{{ asset('css/common.css') }}" />
  @yield('css')
</head>

<body class="body">
  <main class="main">
    <header class="header">
      <a class="menu" href="/menu">≡</a>
      <p class="title">Rese</p>
      @yield('header')
    </header>

    @yield('content')
  </main>
</body>

<footer class="footer">

</footer>

</html>