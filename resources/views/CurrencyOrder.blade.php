<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Order Statement</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet" type="text/css">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body>
        <div class="container">
            <h1>Order</h1>

            <h4>Dear {{$u_info}}</h4>

            <p class="lead mt-2">
                Description: {{$info}}
            </p>

            <p class="lead mt-2">
               Discount Amount: {{$disc}}
            </p>
            <p class="lead mt-2">
                Amount To Be Paid: {{$amount}}
            </p>

        </div>
</body>
</html>