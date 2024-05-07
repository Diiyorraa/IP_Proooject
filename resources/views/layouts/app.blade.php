<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title')</title>
    <link rel="stylesheet" href="{{asset('assets/css/style.css')}}">
</head>

<body>
    <header>
        <nav>
            <ul>
                <li><a href="/">Home</a></li>
                <li><a href="/shoppingList">Shopping Lists</a></li>
            </ul>
        </nav>
    </header>

    <div class="container">
        @yield('content')
    </div>

    <script src="js/app.js"></script>
</body>

</html>