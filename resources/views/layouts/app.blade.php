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
    @if(isset($data['hasTSA']) && isset($data['_id']) && $data['hasTSA'] == true)
        <a href="{{url('/agreement/'. $data['_id'])}}" class="btn btn-tsa">Proceed to Next Document</a>
    @endif
</div>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.2/jquery.min.js"></script>
@stack('scripts')

</body>
</html>