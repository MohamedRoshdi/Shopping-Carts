<!doctype html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>ShoppingCart</title>
    {{--Get Bootstrap .css--}}
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    {{--Get JQuery--}}
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    {{--Get Bootstrap .js--}}
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

    <!-- Styles -->
    <style>
        html, body {
            background-color: #fff;
            color: #636b6f;
            font-family: 'Raleway', sans-serif;
            font-weight: 100;
            height: 100vh;
            margin: 0;
        }

        .full-height {
            height: 100vh;
        }

        .flex-center {
            align-items: center;
            display: flex;
            justify-content: center;
        }

        .position-ref {
            position: relative;
        }

        .top-right {
            position: absolute;
            right: 10px;
            top: 18px;
        }
        .header{
            background-color: lightgray;
            color: black;
            padding: 10px 0;
            position: fixed;
        }

        .content {
            text-align: center;
        }

        .title {
            font-size: 84px;
        }

        .links > a {
            padding: 0 25px;
            font-size: 12px;
            font-weight: 600;
            letter-spacing: .1rem;
            text-decoration: none;
            text-transform: uppercase;
        }

        .m-b-md {
            margin-bottom: 30px;
        }
        .product{
            position: relative;
            text-align: center;
        }
        .product img{
            height: 250px;
            width: 100%;
        }
        .product p{
            font-size: 20px;
        }
        .product button{
            margin: 5px auto;
            display: block;
        }
        .sale{
            width: 100px;
            position: relative;
            top: -250px;
            float: right;
        }
    </style>
</head>
<body>
    <div id="app" class="container">
        <div class="links header container">
            <a href="" class="pull-left">Shopping Carts</a>
            <a href="{{route('carts.index')}}" class="pull-right">Carts</a>
            <a href="{{route('products.index')}}" class="pull-right">Products</a>
        </div>
        <div style="margin-top: 50px;"></div>

        @yield('content')

    </div>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}"></script>
</body>
</html>
