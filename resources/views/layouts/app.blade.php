@include('layouts.header')

@if (auth()->user()->type == 'admin')
@yield('content')
@else

@yield('content')
</div>

</div>

<body style="background-color:#e9ecef;">

    <!-- loader -->
    <div id="loader">
        <div class="spinner-border text-primary" role="status"></div>
    </div>
    <!-- * loader -->

    </div>
    <!-- * App Capsule -->
    @endif
    @include('layouts.footer')