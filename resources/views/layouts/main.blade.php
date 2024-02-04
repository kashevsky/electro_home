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