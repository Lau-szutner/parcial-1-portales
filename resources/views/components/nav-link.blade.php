<?php
//  @var string $route
?>
<a class="text-xl {{ request()->routeIs($route) ? 'font-bold' : '' }}"
    href="{{ route($route) }}">
    {{ $slot }}
</a>