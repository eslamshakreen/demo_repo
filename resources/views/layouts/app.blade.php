<!DOCTYPE html>
<html lang="ar">

<head>
    <meta charset="UTF-8">
    <title>@yield('title', 'ShopLite')</title>
    <style>
        body {
            margin: 0;
            font-family: sans-serif;
            background: #f5f7fa
        }

        header,
        footer {
            background: #0d6efd;
            color: #fff;
            padding: 1rem;
            text-align: center
        }

        main {
            max-width: 960px;
            margin: 2rem auto;
            padding: 1rem;
            background: #fff;
            box-shadow: 0 2px 6px #ccc
        }

        nav a {
            color: #fff;
            margin: 0 .5rem;
            text-decoration: none;
            font-weight: bold
        }
    </style>
</head>

<body>

    <header>
        @include('partials.nav')
    </header>

    <main>
        @yield('content')
    </main>

    <footer>
        @include('partials.footer')
    </footer>

</body>

</html>