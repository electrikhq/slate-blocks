{{-- x-slate-block::empty-state --}}
@props([
    'title' => 'Nothing here yet',
    'description' => null,
    'primaryLabel' => 'Get started',
    'primaryHref' => null,
    'secondaryLabel' => null,
    'secondaryHref' => null,
])

<div {{ $attributes->class('flex min-h-[28rem] items-center justify-center bg-muted/30 p-6 sm:p-10') }}>
    <x-slate::empty
        class="max-w-md bg-background"
        :title="$title"
        :description="$description"
    >
        @if (isset($media))
            <x-slot:media>{{ $media }}</x-slot:media>
        @else
            <x-slot:media>
                <div class="flex size-12 items-center justify-center rounded-full bg-muted text-muted-foreground">
                    <svg class="size-6" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.75" aria-hidden="true">
                        <path d="M12 5v14M5 12h14" />
                    </svg>
                </div>
            </x-slot:media>
        @endif

        <x-slot:actions>
            @if (isset($actions))
                {{ $actions }}
            @else
                @if ($primaryHref)
                    <x-slate::button as="a" href="{{ $primaryHref }}">{{ $primaryLabel }}</x-slate::button>
                @else
                    <x-slate::button type="button">{{ $primaryLabel }}</x-slate::button>
                @endif
                @if ($secondaryLabel)
                    @if ($secondaryHref)
                        <x-slate::button as="a" variant="outline" href="{{ $secondaryHref }}">{{ $secondaryLabel }}</x-slate::button>
                    @else
                        <x-slate::button type="button" variant="outline">{{ $secondaryLabel }}</x-slate::button>
                    @endif
                @endif
            @endif
        </x-slot:actions>
    </x-slate::empty>
</div>
