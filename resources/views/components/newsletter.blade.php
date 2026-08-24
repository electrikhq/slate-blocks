{{-- x-slate-block::newsletter --}}
@props([
    'eyebrow' => 'Newsletter',
    'title' => 'Ship notes, not noise',
    'description' => null,
    'footnote' => null,
])

<section {{ $attributes->merge(['id' => $attributes->get('id', 'newsletter')])->class('border-t border-border px-4 py-16 sm:px-6') }}>
    <div class="mx-auto max-w-2xl text-center">
        @if ($eyebrow)
            <p class="text-xs font-medium uppercase tracking-wider text-muted-foreground">{{ $eyebrow }}</p>
        @endif
        <h2 class="mt-3 text-2xl font-semibold tracking-tight text-foreground">{{ $title }}</h2>
        @if ($description)
            <p class="mx-auto mt-3 max-w-lg text-muted-foreground">{{ $description }}</p>
        @endif

        <div class="mx-auto mt-8 w-full max-w-lg">
            {{ $slot }}
        </div>

        @if ($footnote)
            <p class="mt-4 text-xs text-muted-foreground">{{ $footnote }}</p>
        @endif
    </div>
</section>
