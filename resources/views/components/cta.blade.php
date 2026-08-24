{{-- x-slate-block::cta --}}
@props([
    'title' => 'Ready to ship?',
    'description' => null,
    'primaryHref' => '#',
    'primaryLabel' => 'Get started',
    'secondaryHref' => null,
    'secondaryLabel' => 'Contact us',
])

<section {{ $attributes->class('border-t border-border bg-muted/30 px-4 py-16 sm:px-6') }}>
    <div class="mx-auto max-w-2xl text-center">
        <h2 class="text-2xl font-semibold tracking-tight sm:text-3xl">{{ $title }}</h2>
        @if ($description)
            <p class="mt-3 text-muted-foreground">{{ $description }}</p>
        @endif

        {{ $slot }}

        <div class="mt-8 flex flex-wrap items-center justify-center gap-3">
            <x-slate::button as="a" href="{{ $primaryHref }}">{{ $primaryLabel }}</x-slate::button>
            @if ($secondaryHref)
                <x-slate::button as="a" variant="outline" href="{{ $secondaryHref }}">{{ $secondaryLabel }}</x-slate::button>
            @endif
        </div>
    </div>
</section>
