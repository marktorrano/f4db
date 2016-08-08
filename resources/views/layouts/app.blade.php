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
        @if(isset($data['hasTSA']) && $data['hasTSA'] == true)
            <button class="btn btn-tsa" style="padding: .6em">Proceed to Next Document</button>
        @endif

</div>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/vue/1.0.26/vue.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/vue-resource/0.7.0/vue-resource.min.js"></script>
<script src="{{ asset('assets/js/date-format.js') }}"></script>
@stack('scripts')

</body>
</html>