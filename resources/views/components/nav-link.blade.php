<?php
//  @var string $route
?>
<a class="{{ request()->routeIs($route) ? 'text-black font-bold' : 'text-white' }}" href="{{ route($route) }}">
    {{ $slot }}
</a>


{{-- 
<!-- Act only according to that maxim whereby you can, at the same time, will that it should become a universal law. - Immanuel Kant -->
<a class="nav-link {{ request()->routeIs($route) ? 'active' : '' }}" {!! request()->routeIs($route) ? 'aria-current=”page”' : '' !!} href="{{ route($route) }}">
    {{ $slot }}
</a> --}}
