<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('css/slick.css') }}">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link
        href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800&display=swap"
        rel="stylesheet">
    <title>Readme | {{ \Route::currentRouteName() }}</title>
</head>

<body class="page">

    <header class="page__header">
        @include('partials/navbar')
    </header>
    <main id="main" role="main" class="main">
        <div class="spinner spinner--active" id="spinner">
            @include('partials/spinner')
        </div>

        <div>
            @yield('content')
        </div>
    </main>

    <script src="{{ asset('js/app.js') }}"></script>
    <footer class="page__footer">
        SOČ 2020
    </footer>
</body>

</html>
