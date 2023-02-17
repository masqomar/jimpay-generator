@include('layouts.header')

@if (auth()->user()->type == 'admin')
@yield('content')
@else

@yield('content')
</div>

</div>



</div>
<!-- * App Capsule -->
@endif
@include('layouts.footer')