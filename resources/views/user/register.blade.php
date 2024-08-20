@extends('layouts.app')
@section('content')

@push('styles')
<style type="text/css">
@import url('https://fonts.googleapis.com/css?family=Raleway:400,700');

{{--  * {
	box-sizing: border-box;
	margin: 0;
	padding: 0;	
	font-family: Raleway, sans-serif;
}  --}}

{{--  body {
	background: linear-gradient(90deg, #C7C5F4, #776BCC);		
}  --}}

.candidate-login .container {
	display: flex;
	align-items: center;
	justify-content: center;
	min-height: 100vh;
}

.candidate-login .screen {		
	background: linear-gradient(90deg, #5D54A4, #7C78B8);		
	position: relative;	
	height: 600px;
	width: 360px;	
	box-shadow: 0px 0px 24px #5C5696;
}

.candidate-login .screen__content {
	z-index: 1;
	position: relative;	
	height: 100%;
}

.candidate-login .screen__background {		
	position: absolute;
	top: 0;
	left: 0;
	right: 0;
	bottom: 0;
	z-index: 0;
	-webkit-clip-path: inset(0 0 0 0);
	clip-path: inset(0 0 0 0);	
}

.candidate-login .screen__background__shape {
	transform: rotate(45deg);
	position: absolute;
}

.candidate-login .screen__background__shape1 {
	height: 520px;
	width: 520px;
	background: #FFF;	
	top: -50px;
	right: 120px;	
	border-radius: 0 72px 0 0;
}

.candidate-login .screen__background__shape2 {
	height: 220px;
	width: 220px;
	background: #6C63AC;	
	top: -172px;
	right: 0;	
	border-radius: 32px;
}

.candidate-login .screen__background__shape3 {
	height: 540px;
	width: 190px;
	background: linear-gradient(270deg, #5D54A4, #6A679E);
	top: -24px;
	right: 0;	
	border-radius: 32px;
}

.candidate-login .screen__background__shape4 {
	height: 400px;
	width: 200px;
	background: #7E7BB9;	
	top: 420px;
	right: 50px;	
	border-radius: 60px;
}

.candidate-login .login {
	width: 320px;
	padding: 30px;
	padding-top: 156px;
}

.candidate-login .login__field {
	padding: 20px 0px;	
	position: relative;	
}

.candidate-login .login__icon {
	position: absolute;
	top: 39px;
	color: #7875B5;
}

.candidate-login .login__input {
	border: none;
	border-bottom: 2px solid #D1D1D4;
	background: none;
	padding: 10px;
	padding-left: 24px;
	font-weight: 700;
	width: 111%;
	transition: .2s;

}

.candidate-login .login__input:active,
.candidate-login .login__input:focus,
.candidate-login .login__input:hover {
	outline: none;
	border-bottom-color: #6A679E;
}

.candidate-login .login__submit {
	background: #fff;
	font-size: 14px;
	margin-top: 30px;
	padding: 16px 20px;
	border-radius: 26px;
	border: 1px solid #D4D3E8;
	text-transform: uppercase;
	font-weight: 700;
	display: flex;
	align-items: center;
	width: 100%;
	color: #4C489D;
	box-shadow: 0px 2px 2px #5C5696;
	cursor: pointer;
	transition: .2s;
}

.candidate-login .login__submit:active,
.candidate-login .login__submit:focus,
.candidate-login .login__submit:hover {
	border-color: #6A679E;
	outline: none;
}

.candidate-login .button__icon {
	font-size: 24px;
	margin-left: auto;
	color: #7875B5;
}

.candidate-login .social-login {	
	position: absolute;
	height: 140px;
	width: 160px;
	text-align: center;
	bottom: 0px;
	right: 0px;
	color: #fff;
}

.candidate-login .social-icons {
	display: flex;
	align-items: center;
	justify-content: center;
}

.candidate-login .social-login__icon {
	padding: 20px 10px;
	color: #fff;
	text-decoration: none;	
	text-shadow: 0px 0px 8px #7875B5;
}

.candidate-login .social-login__icon:hover {
	transform: scale(1.5);	
}
</style>
@endpush
<section class="section-box bg-banner-about banner-home-3 pages contact  pt-3 mb-35">
    <div class="banner-hero">
        <div class="banner-inner">
            <div class="row">
                <div class="col-lg-12">
                    <div class="block-banner">
                        <h3 class="heading-banner text-center wow animate__animated animate__fadeInUp  mt-35">
                            {{__('Candidate Register') }} </h3>
                        
                        <div class="list-tags-banner mt-3 text-center wow animate__animated animate__fadeInUp">
                            <div class="text-center">
                                <ul class="breadcrumbs mt-sm-15">
                                    <li><a href="{{route('index')}}">{{__('Home')}}</a></li>
                                    <li>{{ __('Candidate Register') }}</li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>


<div class="candidate-login">
	<?php
	$c_or_e = old('candidate_or_employer', 'candidate');
	?>
    <div class="container">
        <div class="screen">
            <div class="screen__content">
                @include('flash::message')

                <form class="login" class="form-horizontal"  method="POST" action="{{ route('register') }}">
                    {{ csrf_field() }}
                    <input type="hidden" name="candidate_or_employer" value="candidate" />
                    <div class="login__field{{ $errors->has('first_name') ? ' has-error' : '' }}">
                        <i class="login__icon fas fa-user"></i>
                        <input  class="login__input" name="first_name" class="form-control" required="required" placeholder="{{__('First Name')}}" value="{{old('first_name')}}">
                        @if ($errors->has('first_name'))
                        <span class="help-block">
                            <strong>{{ $errors->first('first_name') }}</strong>
                        </span>
                        @endif
                    </div>
                    <div class="login__field{{ $errors->has('middle_name') ? ' has-error' : '' }}">
                        <i class="login__icon fas fa-user"></i>
                        <input  class="login__input" name="middle_name" class="form-control" placeholder="{{__('Middle Name')}}" value="{{old('middle_name')}}">
                        @if ($errors->has('middle_name'))
                        <span class="help-block">
                            <strong>{{ $errors->first('middle_name') }}</strong>
                        </span>
                        @endif
                    </div>
                    <div class="login__field{{ $errors->has('last_name') ? ' has-error' : '' }}">
                        <i class="login__icon fas fa-user"></i>
                        <input  class="login__input" name="last_name" class="form-control" placeholder="{{__('Last Name')}}" value="{{old('last_name')}}">
                        @if ($errors->has('last_name'))
                        <span class="help-block">
                            <strong>{{ $errors->first('last_name') }}</strong>
                        </span>
                        @endif
                    </div>
                    <div class="login__field{{ $errors->has('email') ? ' has-error' : '' }}">
                        <i class="login__icon fas fa-user"></i>
                        <input  class="login__input" type="email" name="email" value="{{ old('email') }}" required autofocus placeholder="{{__('Email Address')}}">
                        @if ($errors->has('email'))
                        <span class="help-block">
                            <strong>{{ $errors->first('email') }}</strong>
                        </span>
                        @endif
                    </div>
                    <div class="login__field{{ $errors->has('password') ? ' has-error' : '' }}">
                        <i class="login__icon fas fa-lock"></i>
                        <input  class="login__input" type="password"  name="password" value="" required placeholder="{{__('Password')}}">
                        @if ($errors->has('password'))
                        <span class="help-block">
                            <strong>{{ $errors->first('password') }}</strong>
                        </span>
                        @endif
                    </div>
                    <div class="login__field{{ $errors->has('password_confirmation') ? ' has-error' : '' }}">
                        <i class="login__icon fas fa-lock"></i>
                        <input  class="login__input" type="password"  name="password_confirmation" value="" required placeholder="{{__('Password')}}">
                        @if ($errors->has('password_confirmation'))
                        <span class="help-block">
                            <strong>{{ $errors->first('password_confirmation') }}</strong>
                        </span>
                        @endif
                    </div>
                
             

                    <div class="formrow{{ $errors->has('is_subscribed') ? ' has-error' : '' }}">

                        <?php

                        $is_checked = '';

                        if (old('is_subscribed', 1)) {

                            $is_checked = 'checked="checked"';
                        }

                        ?>



                        <input type="checkbox" value="1" name="is_subscribed" {{$is_checked}} />
                        {{__('Subscribe to Newsletter')}}

                        @if ($errors->has('is_subscribed')) <span class="help-block"> <strong>{{ $errors->first('is_subscribed') }}</strong> </span> @endif
                    </div>





                    <div class="formrow{{ $errors->has('terms_of_use') ? ' has-error' : '' }}">

                        <input type="checkbox" value="1" name="terms_of_use" />

                        <a href="{{url('cms/terms-of-use')}}">{{__('I accept Terms of Use')}}</a>



                        @if ($errors->has('terms_of_use')) <span class="help-block"> <strong>{{ $errors->first('terms_of_use') }}</strong> </span> @endif
                    </div>

                    <div class="form-group col-12 col-sm-12 col-md-10 text-center mx-auto mobile-padding-no {{ $errors->has('g-recaptcha-response') ? ' has-error' : '' }}">
                        {!! app('captcha')->display() !!}
                        @if ($errors->has('g-recaptcha-response')) <span class="help-block">
                            <strong>{{ $errors->first('g-recaptcha-response') }}</strong> </span> @endif
                    </div>
                    <button class="button login__submit" type="submit">
                        <span class="button__text">{{__('register')}}</span>
                        <i class="button__icon fas fa-chevron-right"></i>
                    </button>		
                    <div class="newuser"><i class="fas fa-user" aria-hidden="true"></i> {{__('Have Account')}}? <a href="{{route('login')}}">{{__('Sign in')}}</a></div>

                </form>
                
           
            </div>
            <div class="screen__background">
                <span class="screen__background__shape screen__background__shape4"></span>
                <span class="screen__background__shape screen__background__shape3"></span>		
                <span class="screen__background__shape screen__background__shape2"></span>
                <span class="screen__background__shape screen__background__shape1"></span>
            </div>		
        </div>
    </div>
</div>


@endsection