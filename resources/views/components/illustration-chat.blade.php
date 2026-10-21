{{-- x-slate-block::illustration-chat --}}
@props([
    'label' => 'Assistant',
    'name' => 'Assistant',
    'status' => 'Online',
    'badge' => 'Live',
    'messages' => [
        ['role' => 'user', 'text' => 'How do I add team billing?'],
        ['role' => 'assistant', 'text' => 'Cashier sits on the team. Sync plans, then open /billing.'],
        ['role' => 'user', 'text' => 'Can Cursor install this?'],
        ['role' => 'assistant', 'text' => 'Yes — point it at electrik.dev/llms.txt and keep App\\ for product code.'],
    ],
    'interval' => 1600,
])

@php
    $messages = array_values($messages);
    $steps = count($messages) + 1;
@endphp

<x-slate-block::illustration-shell :label="$label" :steps="$steps" :interval="$interval" {{ $attributes }}>
    <div class="mb-3 flex items-center justify-between">
        <div class="flex items-center gap-2">
            <x-slate::avatar size="sm" fallback="AI" dot="success" />
            <div>
                <p class="text-sm font-medium">{{ $name }}</p>
                @if ($status)
                    <p class="text-xs text-muted-foreground">{{ $status }}</p>
                @endif
            </div>
        </div>
        @if ($badge)
            <x-slate::badge variant="outline">{{ $badge }}</x-slate::badge>
        @endif
    </div>

    <div class="space-y-2">
        @foreach ($messages as $i => $message)
            <div
                class="flex transition-all duration-500"
                x-bind:class="step >= {{ $i }} ? 'opacity-100 translate-y-0' : 'opacity-0 translate-y-1'"
                @class([
                    'justify-end' => ($message['role'] ?? 'assistant') === 'user',
                    'justify-start' => ($message['role'] ?? 'assistant') !== 'user',
                ])
            >
                <div
                    @class([
                        'max-w-[85%] rounded-lg px-3 py-2 text-sm',
                        'bg-primary text-primary-foreground' => ($message['role'] ?? 'assistant') === 'user',
                        'bg-muted text-foreground' => ($message['role'] ?? 'assistant') !== 'user',
                    ])
                >
                    {{ $message['text'] }}
                </div>
            </div>
        @endforeach

        <div
            class="flex items-center gap-1 px-1 transition-opacity duration-300"
            x-bind:class="step < {{ count($messages) }} ? 'opacity-100' : 'opacity-0'"
        >
            <span class="slate-ill-dot size-1.5 rounded-full bg-muted-foreground"></span>
            <span class="slate-ill-dot size-1.5 rounded-full bg-muted-foreground"></span>
            <span class="slate-ill-dot size-1.5 rounded-full bg-muted-foreground"></span>
        </div>
    </div>
</x-slate-block::illustration-shell>
