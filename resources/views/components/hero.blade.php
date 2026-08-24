{{-- x-slate-block::hero --}}
@props([
    'title',
    'description' => null,
    'primaryHref' => '#',
    'primaryLabel' => 'Get started',
    'secondaryHref' => null,
    'secondaryLabel' => 'Learn more',
])

<section {{ $attributes->class('relative overflow-hidden bg-background py-24 sm:py-32') }}>
    <div class="mx-auto max-w-7xl px-6 lg:px-8">
        <div class="mx-auto max-w-2xl text-center">
            <h1 class="text-4xl font-bold tracking-tight text-foreground sm:text-6xl">
                {{ $title }}
            </h1>

            @if ($description)
                <p class="mt-6 text-lg leading-8 text-muted-foreground">
                    {{ $description }}
                </p>
            @endif

            {{ $slot }}

            <div class="mt-10 flex items-center justify-center gap-x-4">
                <x-slate::button as="a" size="lg" href="{{ $primaryHref }}">
                    {{ $primaryLabel }}
                </x-slate::button>
                @if ($secondaryHref)
                    <x-slate::button as="a" variant="outline" size="lg" href="{{ $secondaryHref }}">
                        {{ $secondaryLabel }}
                    </x-slate::button>
                @endif
            </div>
        </div>
    </div>
</section>
