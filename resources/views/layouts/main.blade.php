<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <base href="{{ URL('/') }}">
    <link rel="stylesheet" type="text/css" href="css/style.css" />
    <link rel="shortcut icon" href="">
    <title></title>
    <meta name="description" content="">
    <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Jost:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
    <script>
        function sendAjax(url, body) {
            return fetch(url, {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json'
                },
                body: JSON.stringify(body)
            });
        }
    </script>
<body>
    <header>
        @include('components.header')
    </header>
    <div class="content">
        @yield('content')
    </div>
</body>
<footer>
    @include('components.footer')
    <script src="//unpkg.com/alpinejs" defer></script>
</footer>
</html>
