{{-- x-slate-block::danger-zone --}}
@props([
    'title' => 'Danger zone',
    'description' => 'This action cannot be undone.',
    'actionLabel' => 'Delete',
    'variant' => 'destructive',
])

<x-slate::alert
    {{ $attributes->merge(['variant' => $variant]) }}
    :title="$title"
    :description="$description"
>
    <x-slot:action>
        @if (isset($action))
            {{ $action }}
        @else
            <x-slate::button size="sm" variant="destructive" type="button">{{ $actionLabel }}</x-slate::button>
        @endif
    </x-slot:action>
</x-slate::alert>
