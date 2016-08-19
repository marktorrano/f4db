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
        {!! Form::open(array('url' => 'agreement')) !!}

        {!! Form::hidden('id', $data['_id']) !!}
        {!! Form::hidden('lang', $data['lang']) !!}

        {!! Form::submit('Next Document', ['class' => 'btn btn-primary']) !!}
        {!! Form::close() !!}
    @endif
</div>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.2/jquery.min.js"></script>
@stack('scripts')

</body>
</html>