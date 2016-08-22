<!doctype html>
<html lang="en">
<head>
    @include('head')
    @stack('styles')

</head>
<body>
<div class="container">

    @yield('content')

    <footer class="row">

        @include('footer')

    </footer>

</div>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.2/jquery.min.js"></script>
@stack('scripts')

</body>
</html>