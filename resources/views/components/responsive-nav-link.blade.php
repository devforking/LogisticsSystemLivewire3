@props(['active'])

@php
    $isActive = $active ?? false;
    $baseClasses = 'flex items-center text-base font-medium py-2 pl-3 transition duration-150 ease-in-out';

    // Clases para cuando el enlace está activo.
    $activeClasses = $isActive ? 'bg-primary-700 text-white' : 'text-gray-700 dark:text-gray-400';

    // Clases de enfoque comunes para activo y no activo.
    $focusClasses = 'focus:outline-none focus:text-white focus:bg-gray-50 dark:focus:bg-gray-700';

    // Clases de hover que aplican fondo gris y texto blanco para ambos estados.
    $hoverClasses = ' hover:text-white  dark:hover:text-white';

    // Clases responsivas para pantallas grandes.
    $responsiveClasses = 'lg:bg-transparent lg:border-0 lg:hover:text-white lg:p-0';

    // Clases de opacidad que varían según el estado activo o no.
    $opacityClasses = $isActive ? 'opacity-100' : 'opacity-75';

    // Combinando todas las clases.
    $classes = "{$baseClasses} {$activeClasses} {$focusClasses} {$hoverClasses} {$responsiveClasses} {$opacityClasses}";
@endphp

<a {{ $attributes->merge(['class' => $classes]) }}>
    {{ $slot }}
</a>
