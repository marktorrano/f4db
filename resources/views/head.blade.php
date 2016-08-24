    <meta charset="UTF-8">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@if(isset($t))<?= $t['doc.title'] ?> @else Site Survey Document @endif</title>

    <link rel="stylesheet" href="{{asset('assets/css/app.css')}}"/>
    <link rel="shortcut icon" href="{{asset('assets/img/favicon.png')}}">
