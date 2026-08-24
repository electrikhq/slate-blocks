{{-- x-slate-block::feature-grid --}}
@props([
    'title' => 'Everything you need',
    'description' => null,
    'features' => [],
])

@php
    /** @var list<array{title: string, description: string, icon?: string|null}> $features */
@endphp

<section {{ $attributes->class('bg-background px-4 py-12 sm:px-6 sm:py-16') }}>
    <div class="mx-auto max-w-5xl">
        <div class="mx-auto max-w-2xl text-center">
            <h2 class="text-3xl font-semibold tracking-tight sm:text-4xl">{{ $title }}</h2>
            @if ($description)
                <p class="mt-3 text-muted-foreground">{{ $description }}</p>
            @endif
        </div>

        <div class="mt-10 grid gap-4 sm:grid-cols-2 lg:grid-cols-3">
            @foreach ($features as $feature)
                <x-slate::card class="border-border/80 shadow-xs">
                    <x-slate::card-header>
                        <x-slate::card-title class="text-base">{{ $feature['title'] }}</x-slate::card-title>
                        <x-slate::card-description>{{ $feature['description'] }}</x-slate::card-description>
                    </x-slate::card-header>
                </x-slate::card>
            @endforeach
        </div>

        {{ $slot }}
    </div>
</section>
