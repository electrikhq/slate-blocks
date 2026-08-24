{{-- x-slate-block::page-header --}}
@props([
    'title',
    'description' => null,
])

<div {{ $attributes->class('flex flex-col gap-4 border-b border-border px-6 py-6 sm:flex-row sm:items-start sm:justify-between') }}>
    <div class="min-w-0 space-y-1">
        <h1 class="text-2xl font-semibold tracking-tight">{{ $title }}</h1>
        @if ($description)
            <p class="text-sm text-muted-foreground">{{ $description }}</p>
        @endif
        {{ $slot }}
    </div>
    @if (isset($actions))
        <div class="flex shrink-0 flex-wrap items-center gap-2">
            {{ $actions }}
        </div>
    @endif
</div>
