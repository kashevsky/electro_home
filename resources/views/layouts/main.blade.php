<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="robots" content="noindex, nofollow"/>
    <base href="{{ URL('/') }}">
    <link rel="stylesheet" type="text/css" href="css/style.css" />
    <link rel="shortcut icon" href="">
    <title></title>
    <meta name="description" content="">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Jost:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Nunito+Sans:ital,opsz,wght@0,6..12,200;0,6..12,300;0,6..12,400;0,6..12,500;0,6..12,600;0,6..12,700;0,6..12,800;0,6..12,900;0,6..12,1000;1,6..12,200;1,6..12,300;1,6..12,400;1,6..12,500;1,6..12,600;1,6..12,700;1,6..12,800;1,6..12,900;1,6..12,1000&display=swap" rel="stylesheet">
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&display=swap" rel="stylesheet">
<link rel="stylesheet" type="text/css" href="css/fancybox.css" media="screen" />
@yield('head')
<script type="text/javascript" src="js/js_jquery.js"></script>
<script type="text/javascript" src="js/core_ajaxconst.php"></script>
<script type="text/javascript" src="js/jquery.selectbox.js"></script>
<script type="text/javascript" src="js/js_scripts.js"></script>
<script type="text/javascript">
    function setBigImage(foto) {
        $("#adpdp14").attr('href', $(foto).parent('.it').children('a').attr('href'));
        document.getElementById("dp14").src = foto.src;
    }
</script>
    <script>
        function sendAjax(url, body) {
            return fetch(url, {
                method: 'POST',
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
                    'Content-Type': 'application/json'
                },
                body: JSON.stringify(body)
            });
        }
        function initBasket() {
            return {
                count: 0,
                addCount: function() {

                },
                addProduct: function(productId) {
                    let productCount = document.getElementById('productCount').innerHTML;

                    sendAjax('{{route('basket.add')}}', { product_id:productId, product_count: productCount})
                    .then(response => response.json())
                    .then(data => this.count = data.count);
                }
            }
        }
    </script>
<body id="body">
    <div class="modal_wrapper" id="modal_wrapper">
    <div x-data="initBasket()">
    <header>
        @include('components.header')
    </header>
    <div class="content" id="content">
        @yield('content')
    </div>
    </div>
    </div>
</body>
<footer>
    @include('components.footer')
    <script src="//unpkg.com/alpinejs" defer></script>
</footer>
</html>
