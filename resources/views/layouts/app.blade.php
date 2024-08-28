<!doctype html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Online Marketing Complex</title>
    <title>{{ config('app.name', 'Online Marketing Complex') }}</title>
    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">
    @include('includes.css')

   
<style>
    .dropdown-toggle::after {
        display: none; 
    }
</style>
</head>
<body>
    <div id="app">

    @include('includes.navbar')

        <main class="mb-5">
            @yield('content')
            
        </main>
    </div>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        $(document).ready(function() {
            console.log("Fetching cart count from: {{ route('cart.count') }}");
            $.get("{{ route('cart.count') }}", function(data) {
                $('#cart-count').text(data.cart_count);
            });
            $(document).ready(function() {
                console.log("jQuery is working!");
            });

        });
    </script>


 
    @include('includes.footer')
</body>
</html>
