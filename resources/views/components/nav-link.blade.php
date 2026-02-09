<?php
//  @var string $route
?>
<a class="text-xl {{ request()->routeIs($route) ? 'text-[var(--ternary-color)]  font-bold' : 'text-white' }}"
    href="{{ route($route) }}">
    {{ $slot }}
</a>