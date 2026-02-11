<?php
//  @var string $route
?>
<a
    href="{{ route($route) }}"
    class="text-xl {{ 
        request()->routeIs($route)
            ? 'p-2 bg-[var(--secondary-color)] rounded-lg font-bold'
            : '' 
    }}">
    {{ $slot }}
</a>