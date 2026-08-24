{{-- x-slate-block::logos --}}
@props([
    'title' => 'Trusted by teams shipping Laravel',
    'logos' => [],
])

@php
    /** @var list<array{name: string, href?: string|null}> $logos */
@endphp

<section {{ $attributes->class('border-y border-border bg-muted/20 px-4 py-10 sm:px-6') }}>
    <div class="mx-auto max-w-5xl">
        @if ($title)
            <p class="text-center text-xs font-medium uppercase tracking-wider text-muted-foreground">{{ $title }}</p>
        @endif
        <div class="mt-6 flex flex-wrap items-center justify-center gap-x-10 gap-y-4">
            @foreach ($logos as $logo)
                @if (! empty($logo['href']))
                    <a href="{{ $logo['href'] }}" class="text-sm font-semibold tracking-tight text-muted-foreground/80 transition hover:text-foreground">
                        {{ $logo['name'] }}
                    </a>
                @else
                    <span class="text-sm font-semibold tracking-tight text-muted-foreground/80">{{ $logo['name'] }}</span>
                @endif
            @endforeach
        </div>
        {{ $slot }}
    </div>
</section>
