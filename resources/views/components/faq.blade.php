{{-- x-slate-block::faq --}}
@props([
    'title' => 'Frequently asked questions',
    'description' => null,
    'items' => [],
    'footerHref' => null,
    'footerLabel' => 'All FAQs',
])

@php
    /** @var list<array{question: string, answer: string}> $items */
@endphp

<section {{ $attributes->class('bg-background px-4 py-12 sm:px-6 sm:py-16') }}>
    <div class="mx-auto max-w-3xl">
        <div class="text-center">
            <h2 class="text-3xl font-semibold tracking-tight sm:text-4xl">{{ $title }}</h2>
            @if ($description)
                <p class="mt-3 text-muted-foreground">{{ $description }}</p>
            @endif
        </div>

        <div class="mt-10">
            <x-slate::accordion type="single" collapsible class="w-full">
                @foreach ($items as $i => $item)
                    <x-slate::accordion-item value="item-{{ $i }}">
                        <x-slate::accordion-trigger>{{ $item['question'] }}</x-slate::accordion-trigger>
                        <x-slate::accordion-content>
                            <p class="text-sm leading-relaxed text-muted-foreground">{{ $item['answer'] }}</p>
                        </x-slate::accordion-content>
                    </x-slate::accordion-item>
                @endforeach
            </x-slate::accordion>
        </div>

        @if ($footerHref)
            <div class="mt-8 text-center">
                <x-slate::button as="a" variant="outline" href="{{ $footerHref }}">{{ $footerLabel }}</x-slate::button>
            </div>
        @endif

        {{ $slot }}
    </div>
</section>
