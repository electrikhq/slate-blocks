{{-- x-slate-block::illustration-kanban --}}
@props([
    'label' => 'Board',
    'columns' => ['To do', 'In progress', 'Done'],
    'cards' => [
        ['title' => 'Landing page', 'owner' => 'AK', 'lane' => [0, 1, 1, 2]],
        ['title' => 'MCP server', 'owner' => 'JP', 'lane' => [1, 1, 2, 2]],
        ['title' => 'Billing sync', 'owner' => 'MC', 'lane' => [0, 0, 1, 2]],
    ],
    'interval' => 1900,
])

@php
    $columns = array_values($columns);
    $cards = array_values($cards);
    $laneLength = 1;
    foreach ($cards as $card) {
        $laneLength = max($laneLength, count($card['lane'] ?? []));
    }
    $counts = [];
    for ($step = 0; $step < $laneLength; $step++) {
        $counts[$step] = array_fill(0, count($columns), 0);
        foreach ($cards as $card) {
            $lane = $card['lane'][$step] ?? 0;
            if (isset($counts[$step][$lane])) {
                $counts[$step][$lane]++;
            }
        }
    }
@endphp

<x-slate-block::illustration-shell :label="$label" :steps="$laneLength" :interval="$interval" {{ $attributes }}>
    <div class="grid gap-2" style="grid-template-columns: repeat({{ count($columns) }}, minmax(0, 1fr));">
        @foreach ($columns as $colIndex => $title)
            <div class="rounded-lg border border-border bg-muted/40 p-2">
                <div class="mb-2 flex items-center justify-between px-1">
                    <p class="text-[11px] font-medium">{{ $title }}</p>
                    <span
                        class="text-[10px] tabular-nums text-muted-foreground"
                        x-text="@js(array_column($counts, $colIndex))[step]"
                    ></span>
                </div>
                <div class="min-h-[9.5rem] space-y-2">
                    @foreach ($cards as $card)
                        <div
                            class="rounded-md border border-border bg-background p-2 transition-all duration-500"
                            x-cloak
                            x-show="@js($card['lane'])[step] === {{ $colIndex }}"
                            x-transition.opacity.duration.300ms
                        >
                            <p class="text-xs font-medium">{{ $card['title'] }}</p>
                            <div class="mt-2 flex items-center justify-between">
                                <x-slate::avatar size="sm" :fallback="$card['owner'] ?? '?'" />
                                <span class="h-1.5 w-8 rounded-full bg-muted"></span>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        @endforeach
    </div>
</x-slate-block::illustration-shell>
