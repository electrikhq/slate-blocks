{{-- x-slate-block::illustration-activity --}}
@props([
    'label' => 'Activity',
    'events' => [
        ['time' => '14:09', 'title' => 'session.created', 'detail' => 'Initiated session'],
        ['time' => '14:10', 'title' => 'User invited', 'detail' => 'maya@studio.dev · pending'],
        ['time' => '14:12', 'title' => 'Invoice paid', 'detail' => 'Stripe · $49.00'],
        ['time' => '14:16', 'title' => 'Deploy succeeded', 'detail' => 'main · 4f2a9c1'],
        ['time' => '14:18', 'title' => 'Seat added', 'detail' => 'Jules Park joined Acme'],
        ['time' => '14:21', 'title' => 'Plan changed', 'detail' => 'Studio · team billing'],
    ],
])

@php
    $events = array_values($events);
@endphp

<x-slate-block::illustration-shell :label="$label" :steps="1" {{ $attributes }}>
    <div class="relative h-[15.5rem] overflow-hidden">
        <div class="slate-ill-marquee space-y-2">
            @foreach ([$events, $events] as $copy)
                @foreach ($copy as $event)
                    <div class="flex gap-3 rounded-lg border border-border bg-background px-3 py-2.5">
                        @if (! empty($event['time']))
                            <div class="w-10 shrink-0 font-mono text-[11px] text-muted-foreground">{{ $event['time'] }}</div>
                        @endif
                        <div class="min-w-0">
                            <p class="text-sm font-medium">{{ $event['title'] }}</p>
                            @if (! empty($event['detail']))
                                <p class="truncate text-xs text-muted-foreground">{{ $event['detail'] }}</p>
                            @endif
                        </div>
                    </div>
                @endforeach
            @endforeach
        </div>
        <div class="pointer-events-none absolute inset-x-0 top-0 h-8 bg-gradient-to-b from-card to-transparent"></div>
        <div class="pointer-events-none absolute inset-x-0 bottom-0 h-8 bg-gradient-to-t from-card to-transparent"></div>
    </div>
</x-slate-block::illustration-shell>
