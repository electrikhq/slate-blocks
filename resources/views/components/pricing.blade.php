{{-- x-slate-block::pricing --}}
@props([
    'badge' => 'Pricing',
    'title' => 'Simple plans',
    'description' => null,
    'plans' => [],
])

@php
    /** @var list<array{name: string, description?: string, price: string, period?: string|null, features?: list<string>, ctaLabel?: string, ctaHref?: string, featured?: bool, badge?: string|null, buttonVariant?: string}> $plans */
@endphp

<section {{ $attributes->class('bg-background px-4 py-12 sm:px-6 sm:py-16') }}>
    <div class="mx-auto max-w-5xl">
        <div class="mx-auto max-w-2xl text-center">
            @if ($badge)
                <x-slate::badge variant="secondary" class="mb-4">{{ $badge }}</x-slate::badge>
            @endif
            <h2 class="text-3xl font-semibold tracking-tight sm:text-4xl">{{ $title }}</h2>
            @if ($description)
                <p class="mt-3 text-muted-foreground">{{ $description }}</p>
            @endif
        </div>

        <div class="mt-10 grid gap-4 lg:grid-cols-3">
            @foreach ($plans as $plan)
                <x-slate::card @class(['border-primary shadow-sm' => ! empty($plan['featured'])])>
                    <x-slate::card-header>
                        <div class="flex items-center justify-between gap-2">
                            <x-slate::card-title>{{ $plan['name'] }}</x-slate::card-title>
                            @if (! empty($plan['badge']))
                                <x-slate::badge>{{ $plan['badge'] }}</x-slate::badge>
                            @endif
                        </div>
                        @if (! empty($plan['description']))
                            <x-slate::card-description>{{ $plan['description'] }}</x-slate::card-description>
                        @endif
                    </x-slate::card-header>
                    <x-slate::card-content>
                        <p class="text-3xl font-semibold tracking-tight">
                            {{ $plan['price'] }}
                            @if (! empty($plan['period']))
                                <span class="text-sm font-normal text-muted-foreground">{{ $plan['period'] }}</span>
                            @endif
                        </p>
                        @if (! empty($plan['features']))
                            <ul class="mt-4 space-y-2 text-sm text-muted-foreground">
                                @foreach ($plan['features'] as $feature)
                                    <li>{{ $feature }}</li>
                                @endforeach
                            </ul>
                        @endif
                    </x-slate::card-content>
                    <x-slate::card-footer>
                        <x-slate::button
                            as="a"
                            href="{{ $plan['ctaHref'] ?? '#' }}"
                            variant="{{ $plan['buttonVariant'] ?? (! empty($plan['featured']) ? 'default' : 'outline') }}"
                            class="w-full"
                        >
                            {{ $plan['ctaLabel'] ?? 'Get started' }}
                        </x-slate::button>
                    </x-slate::card-footer>
                </x-slate::card>
            @endforeach
        </div>

        {{ $slot }}
    </div>
</section>
