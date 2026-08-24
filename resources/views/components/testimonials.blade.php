{{-- x-slate-block::testimonials --}}
@props([
    'title' => 'What builders say',
    'description' => null,
    'items' => [],
])

@php
    /** @var list<array{quote: string, name: string, role?: string|null}> $items */
@endphp

<section {{ $attributes->class('bg-background px-4 py-12 sm:px-6 sm:py-16') }}>
    <div class="mx-auto max-w-5xl">
        <div class="mx-auto max-w-2xl text-center">
            <h2 class="text-3xl font-semibold tracking-tight">{{ $title }}</h2>
            @if ($description)
                <p class="mt-3 text-muted-foreground">{{ $description }}</p>
            @endif
        </div>

        <div class="mt-10 grid gap-4 md:grid-cols-2 lg:grid-cols-3">
            @foreach ($items as $item)
                <x-slate::card>
                    <x-slate::card-content class="pt-6">
                        <p class="text-sm leading-relaxed text-foreground">“{{ $item['quote'] }}”</p>
                        <div class="mt-4">
                            <p class="text-sm font-medium">{{ $item['name'] }}</p>
                            @if (! empty($item['role']))
                                <p class="text-xs text-muted-foreground">{{ $item['role'] }}</p>
                            @endif
                        </div>
                    </x-slate::card-content>
                </x-slate::card>
            @endforeach
        </div>

        {{ $slot }}
    </div>
</section>
