{{-- x-slate-block::stats-row --}}
@props([
    'stats' => [],
])

@php
    /** @var list<array{label: string, value: string, hint?: string|null}> $stats */
@endphp

<div {{ $attributes->class('grid gap-4 sm:grid-cols-2 lg:grid-cols-4') }}>
    @foreach ($stats as $stat)
        <div class="rounded-xl border border-border bg-card p-4">
            <p class="text-xs text-muted-foreground">{{ $stat['label'] }}</p>
            <p class="mt-2 text-2xl font-semibold tracking-tight">{{ $stat['value'] }}</p>
            @if (! empty($stat['hint']))
                <p class="mt-1 text-xs text-muted-foreground">{{ $stat['hint'] }}</p>
            @endif
        </div>
    @endforeach
    {{ $slot }}
</div>
