<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>
        Web shop
    </title>
    <link rel="icon" type="image/x-icon" href="https://cdn.pixabay.com/photo/2017/02/18/19/20/logo-2078018_960_720.png">
    
    <!-- Common CSS -->
    <link rel="stylesheet" href="{{ asset('css/styles.css') }}">
    <link rel="stylesheet" href="{{ asset('css/header.css') }}">
    <link rel="stylesheet" href="{{ asset('css/product.css') }}">
    <link rel="stylesheet" href="{{ asset('css/login.css') }}">
    <link rel="stylesheet" href="{{ asset('css/pagination.css') }}">
    <link rel="stylesheet" href="{{ asset('css/about.css') }}">
    <link rel="stylesheet" href="{{ asset('css/footer.css') }}">
    <link rel="stylesheet" href="{{ asset('css/orders.css') }}">
    <link rel="stylesheet" href="{{ asset('css/cart.css') }}">
    <link rel="stylesheet" href="{{ asset('css/comments.css') }}">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    
</head>

<body>
    <div class="wrapper">
        <header class="header">
            <div class="background-block"></div>
           @include('layouts.header')
        </header>
        
        <div class="content">
            @yield('content')
        </div>
        
        <!-- Footer -->
        @if(!isset($hideFooter) || !$hideFooter)
            <footer>
                @include('layouts.footer')
            </footer>
        @endif
    </div>
    

    <script src="../../js/script.js"></script>
    <script src="../../js/image-script.js"></script>
</body>
</html>
