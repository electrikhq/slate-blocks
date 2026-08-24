{{-- x-slate-block::alert-banner --}}
@props([
    'title' => 'Heads up',
    'description' => null,
    'variant' => 'default',
    'actionLabel' => null,
    'actionHref' => null,
])

<div {{ $attributes->class('px-4 py-3 sm:px-6') }}>
    <x-slate::alert :variant="$variant" :title="$title" :description="$description">
        @if ($actionLabel || isset($action))
            <x-slot:action>
                @if (isset($action))
                    {{ $action }}
                @elseif ($actionHref)
                    <x-slate::button as="a" size="sm" variant="outline" href="{{ $actionHref }}">{{ $actionLabel }}</x-slate::button>
                @else
                    <x-slate::button size="sm" variant="outline" type="button">{{ $actionLabel }}</x-slate::button>
                @endif
            </x-slot:action>
        @endif
    </x-slate::alert>
    {{ $slot }}
</div>
