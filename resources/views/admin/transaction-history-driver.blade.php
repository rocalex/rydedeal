<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <title>{{ config('app.name', 'Laravel') }}</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('css/colors/blue.css') }}">
</head>
<body class="gray">
<div id="wrapper">
    @include('partials.admin-header')
    <div class="clearfix"></div>
    <div class="dashboard-container">
        @include('partials.admin-sidebar')
        <div class="dashboard-content-container" data-simplebar>
            <div class="dashboard-content-inner">
                <!-- start content -->
                <div class="dashboard-headline">
                    <h3>Transaction History</h3>
                    <nav id="breadcrumbs" class="dark">
                        <ul>
                            <li><a href="{{ url('/') }}">Home</a></li>
                            <li><a href="{{ route('dashboard') }}">Dashboard</a></li>
                            <li>Transaction History</li>
                        </ul>
                    </nav>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <div class="dashboard-box">
                            <div class="headline">
                                <h3>Transaction History</h3>
                            </div>
                            <div class="content">
                                <ul class="dashboard-box-list">
                                    @foreach($payItems as $payItem)
                                    <li>
                                        <div class="job-listing">
                                            <div class="job-listing-details">
                                                <div class="job-listing-description">
                                                    <h3 class="job-listing-title">
                                                        You earned: {{ $payItem->amount / 100 * 0.25 }}
                                                        <span class="badge badge-success">Total: {{ $payItem->amount / 100 }} {{ $payItem->currency }}</span>
                                                    </h3>
                                                    <div class="job-listing-footer">
                                                        <a href="{{ route('rides.show', ['ride' => $payItem->ride_id]) }}">Ride ID: #{{ $payItem->ride_id }}</a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </li>
                                    @endforeach
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- end content -->
                <div class="dashboard-footer-spacer"></div>
                @include('partials.admin-footer')
            </div>
        </div>
    </div>
</div>
<script src="{{ asset('js/jquery-3.4.1.min.js') }}"></script>
<script src="{{ asset('js/moment.min.js') }}"></script>
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
@include('scripts.pusher-notification')
<script>
    // Snackbar for user status switcher
    $('#snackbar-user-status label').click(function() {
        Snackbar.show({
            text: 'Your status has been changed!',
            pos: 'bottom-center',
            showAction: false,
            actionText: "Dismiss",
            duration: 3000,
            textColor: '#fff',
            backgroundColor: '#383838'
        });
    });
</script>
@if(auth()->check() && auth()->user()->hasRole('driver'))
    @include('scripts.capture-location')
@endif
</body>
</html>
