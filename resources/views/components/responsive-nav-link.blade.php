@props(['active'])

@php
    $isActive = $active ?? false;
    $baseClasses = 'flex items-center text-base font-medium py-4 pl-6 nav-item transition duration-150 ease-in-out';

    // Clases para cuando el enlace está activo.
    $activeClasses = $isActive ? 'opacity-100 border-l-4 border-indigo-400 bg-indigo-50' : 'border-transparent';

    // Clases de enfoque comunes para activo y no activo.
    $focusClasses = 'focus:outline-none focus:text-white';

    // Clases de hover que aplican texto blanco y negrita para ambos estados.
    $hoverClasses = 'hover:text-white hover:font-bold';

    // Clases de opacidad y color de texto que varían según el estado activo o no.
    $textColorClasses = $isActive ? 'text-indigo-700 hover:bg-indigo-100 hover:border-indigo-700' : 'text-white-600 hover:bg-gray-50';
    $opacityClasses = !$isActive ? 'opacity-75' : 'opacity-100';

    // Combinando todas las clases.
    $classes = "{$baseClasses} {$textColorClasses} {$activeClasses} {$focusClasses} {$hoverClasses} {$opacityClasses}";
@endphp

<a {{ $attributes->merge(['class' => $classes]) }}>
    {{ $slot }}
</a>
