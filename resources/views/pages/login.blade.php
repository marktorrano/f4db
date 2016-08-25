@extends('layouts.app')

@push('styles')
<link rel="stylesheet" href="{{url('assets/css/theme/metronic/bootstrap.css')}}">
<link media="all" type="text/css" rel="stylesheet" href="{{url('assets/css/login.css')}}">
<link rel="stylesheet" href="{{url('assets/css/theme/metronic/components.css')}}">

@endpush

@section('content')
    <div class="login">
        <!-- BEGIN LOGIN -->
        <div class="content" style="margin-top:50px;">
            <!-- BEGIN LOGIN FORM -->
            {!!Form::open(['url' => 'users/login', 'class' => 'login-form text-center'])!!}
            <h3 class="form-title font-green">Login to your account</h3>
            @if($error)
                <div class="alert alert-danger">
                    {{$error}}
                </div>
            @endif
            <div class="alert alert-danger display-hide">
                <button class="close" data-close="alert"></button>
                <span>Enter any username and password.</span>
            </div>
            <div class="form-group{!!$errors->first('username', ' has-error')!!}">
                <!--ie8, ie9 does not support html5 placeholder, so we just show field title for that-->
                <label class="control-label visible-ie8 visible-ie9">Username</label>
                <div class="input-icon right">
                    {!!$errors->first('username', '<i class="fa fa-warning tooltips" data-original-title=":message"></i>')!!}
                    {!!Form::text('username', $username, ['class' => 'form-control form-control-solid placeholder-no-fix', 'autocomplete' => 'off', 'placeholder' => 'Username'])!!}
                </div>
            </div>
            <div class="form-group{!!$errors->first('password', ' has-error')!!}">
                <label class="control-label visible-ie8 visible-ie9">Password</label>
                <div class="input-icon right">
                    {!!$errors->first('password', '<i class="fa fa-warning tooltips" data-original-title=":message"></i>')!!}
                    {!!Form::password('password', ['class' => 'form-control form-control-solid placeholder-no-fix', 'autocomplete' => 'off', 'placeholder' => 'Password'])!!}
                </div>
            </div>
            <div class="form-actions text-left">
                <button type="submit" class="btn green uppercase">Login</button>
            </div>
        {!!Form::close()!!}
        <!-- END LOGIN FORM -->
        </div>
    </div>
@endsection
