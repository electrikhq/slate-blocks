{{-- x-slate-block::footer --}}
@props([
    'brand' => 'Electrik',
    'tagline' => null,
    'columns' => [],
    'copyright' => null,
])

@php
    /** @var list<array{title: string, links: list<array{label: string, href: string}>}> $columns */
    $copyright ??= '© '.date('Y').' '.$brand;
@endphp

<footer {{ $attributes->class('border-t border-border bg-background px-4 py-12 sm:px-6') }}>
    <div class="mx-auto max-w-5xl">
        <div class="grid gap-8 sm:grid-cols-2 lg:grid-cols-4">
            <div class="sm:col-span-2 lg:col-span-1">
                <p class="text-sm font-semibold tracking-tight">{{ $brand }}</p>
                @if ($tagline)
                    <p class="mt-2 text-sm text-muted-foreground">{{ $tagline }}</p>
                @endif
                {{ $slot }}
            </div>
            @foreach ($columns as $column)
                <div>
                    <p class="text-xs font-medium uppercase tracking-wider text-muted-foreground">{{ $column['title'] }}</p>
                    <ul class="mt-3 space-y-2">
                        @foreach ($column['links'] as $link)
                            <li>
                                <a href="{{ $link['href'] }}" class="text-sm text-foreground underline-offset-4 hover:underline">
                                    {{ $link['label'] }}
                                </a>
                            </li>
                        @endforeach
                    </ul>
                </div>
            @endforeach
        </div>
        <div class="mt-10 flex flex-col gap-2 border-t border-border pt-6 sm:flex-row sm:items-center sm:justify-between">
            <p class="text-xs text-muted-foreground">{{ $copyright }}</p>
            @if (isset($legal))
                <div class="flex flex-wrap gap-4 text-xs text-muted-foreground">
                    {{ $legal }}
                </div>
            @endif
        </div>
    </div>
</footer>
