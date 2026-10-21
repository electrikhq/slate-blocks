{{-- x-slate-block::illustration-billing --}}
@props([
    'label' => 'Team billing',
    'metricLabel' => 'Monthly recurring',
    'amounts' => ['$2,840', '$2,980', '$3,120', '$2,840'],
    'deltas' => ['+4.2%', '+6.1%', '+8.0%', '+4.2%'],
    'deltaHint' => 'vs last period',
    'seatsLabel' => 'Seats on this team',
    'seats' => ['4 / 10', '5 / 10', '6 / 10', '4 / 10'],
    'seatPercents' => ['40%', '50%', '60%', '40%'],
    'planName' => 'Studio',
    'planHint' => 'Stripe · team as customer',
    'planBadge' => 'Active',
    'bars' => [40, 55, 48, 70, 62, 88, 74, 96],
    'interval' => 2000,
])

@php
    $amounts = array_values($amounts);
    $deltas = array_values($deltas);
    $seats = array_values($seats);
    $seatPercents = array_values($seatPercents);
    $steps = max(count($amounts), 1);
@endphp

<x-slate-block::illustration-shell :label="$label" :steps="$steps" :interval="$interval" {{ $attributes }}>
    <div class="flex items-end justify-between gap-6">
        <div>
            <p class="text-xs text-muted-foreground">{{ $metricLabel }}</p>
            <p class="mt-1 text-3xl font-semibold tracking-tight tabular-nums">
                <span x-text="@js($amounts)[step]">{{ $amounts[0] ?? '' }}</span>
            </p>
            <p class="mt-1 text-xs text-muted-foreground">
                <span class="text-foreground" x-text="@js($deltas)[step]">{{ $deltas[0] ?? '' }}</span>
                {{ $deltaHint }}
            </p>
        </div>
        <div class="flex h-16 w-28 shrink-0 items-end gap-1">
            @foreach ($bars as $h)
                <span
                    class="slate-ill-bar w-2 rounded-sm bg-primary/80"
                    style="height: {{ (int) $h }}%"
                ></span>
            @endforeach
        </div>
    </div>

    <div class="mt-6 space-y-4">
        <div>
            <div class="mb-2 flex items-center justify-between text-xs">
                <span class="font-medium">{{ $seatsLabel }}</span>
                <span class="tabular-nums text-muted-foreground" x-text="@js($seats)[step]">{{ $seats[0] ?? '' }}</span>
            </div>
            <div class="h-2 overflow-hidden rounded-full bg-primary/20">
                <div
                    class="h-full rounded-full bg-primary transition-all duration-700"
                    x-bind:style="'width:' + @js($seatPercents)[step]"
                ></div>
            </div>
        </div>

        <div class="flex items-center justify-between rounded-lg border border-border bg-background px-3 py-2.5">
            <div>
                <p class="text-sm font-medium">{{ $planName }}</p>
                <p class="text-xs text-muted-foreground">{{ $planHint }}</p>
            </div>
            <x-slate::badge>{{ $planBadge }}</x-slate::badge>
        </div>
    </div>
</x-slate-block::illustration-shell>
