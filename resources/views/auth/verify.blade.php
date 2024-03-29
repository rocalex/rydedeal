<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ config('app.name', 'Laravel') }}</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('css/colors/blue.css') }}">
</head>
<body>
<div id="wrapper">
    <header id="header-container" class="fullwidth">
        <div id="header">
            <div class="container">
                <div class="left-side">
                    <div id="logo">
                        <a href="{{ url('/') }}"><img src="{{ asset('images/logo.png') }}" alt=""></a>
                    </div>
                    <nav id="navigation">
                        <ul id="responsive">
                            <li>
                                <a href="{{ url('/') }}" @if(request()->is('/')) class="current" @endif>Home</a>
                            </li>
{{--                            <li>--}}
{{--                                <a href="#">Find a Driver</a>--}}
{{--                            </li>--}}
                            @guest
                                <li><a href="{{ route('login') }}" @if(request()->routeIs('login')) class="current" @endif>Login</a></li>
                                <li><a href="{{ route('register') }}" @if(request()->routeIs('register')) class="current" @endif>Register</a></li>
                            @endguest
                        </ul>
                    </nav>
                    <div class="clearfix"></div>
                </div>
                <div class="right-side">
                    <div class="header-widget">
                        <div class="header-notifications user-menu">
                            <div class="header-notifications-trigger">
                                <a href="#">
                                    <div class="user-avatar status-online">
                                        <img
                                            src="@if(auth()->user()->profile && auth()->user()->profile->avatar) {{ auth()->user()->profile->avatar }} @else {{ asset('images/user-avatar-placeholder.png') }} @endif"
                                            alt="">
                                    </div>
                                </a>
                            </div>
                            <div class="header-notifications-dropdown">
                                <div class="user-status">
                                    <div class="user-details">
                                        <div class="user-avatar status-online">
                                            <img
                                                src="@if(auth()->user()->profile && auth()->user()->profile->avatar) {{ auth()->user()->profile->avatar }} @else {{ asset('images/user-avatar-placeholder.png') }} @endif"
                                                alt="">
                                        </div>
                                        <div class="user-name">
                                            {{ auth()->user()->name }}
                                        </div>
                                    </div>
                                </div>
                                <ul class="user-menu-small-nav">
                                    <li>
                                        <a href="javascript:;"
                                           onclick="document.getElementById('logout-form').submit()">
                                            <i class="icon-material-outline-power-settings-new"></i> Logout
                                        </a>
                                    </li>
                                    <form style="display: none" action="{{ route('logout') }}" method="post"
                                          id="logout-form">
                                        @csrf
                                    </form>
                                </ul>

                            </div>
                        </div>
                    </div>
                    <span class="mmenu-trigger">
                        <button class="hamburger hamburger--collapse" type="button">
                            <span class="hamburger-box">
                                <span class="hamburger-inner"></span>
                            </span>
                        </button>
				    </span>
                </div>
            </div>
        </div>
    </header>
    <div class="clearfix"></div>
    <div id="titlebar" class="gradient">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <h2>{{ __('Verify Your Email Address') }}</h2>
                </div>
            </div>
        </div>
    </div>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-xl-5">
                @if (session('resent'))
                    <div class="notification success closeable">
                        <p>
                            {{ __('A fresh verification link has been sent to your email address.') }}
                        </p>
                        <a class="close">
                        </a>
                    </div>
                @endif
                <div class="section-headline margin-bottom-25">
                    <h4>{{ __('Verify Your Email Address') }}</h4>
                </div>
                <p>
                    {{ __('Before proceeding, please check your email for a verification link.') }}
                    {{ __('If you did not receive the email') }},
                </p>
                <form class="d-inline" method="POST" action="{{ route('verification.resend') }}">
                    @csrf
                    <button type="submit" class="button gray ripple-effect-dark">{{ __('click here to request another') }}</button>
                </form>
            </div>
        </div>
    </div>
    <div class="margin-top-70"></div>
    @include('partials.footer')
</div>
<script src="{{ asset('js/jquery-3.4.1.min.js') }}"></script>
<script src="{{ asset('js/mmenu.min.js') }}"></script>
<script src="{{ asset('js/tippy.all.min.js') }}"></script>
<script src="{{ asset('js/simplebar.min.js') }}"></script>
<script src="{{ asset('js/bootstrap-slider.min.js') }}"></script>
<script src="{{ asset('js/bootstrap-select.min.js') }}"></script>
<script src="{{ asset('js/snackbar.js') }}"></script>
<script src="{{ asset('js/clipboard.min.js') }}"></script>
<script src="{{ asset('js/counterup.min.js') }}"></script>
<script src="{{ asset('js/magnific-popup.min.js') }}"></script>
<script src="{{ asset('js/slick.min.js') }}"></script>
<script src="{{ asset('js/custom.js') }}"></script>
<script>
    $('.account-type label').click(function () {
        $(this).prev().prop('checked', true);
        // console.log($('input[name="on_budget"]:checked').val());
    });
</script>
</body>
</html>

