{{-- Internal frame for illustration-* blocks. Not listed in the gallery catalog. --}}
@props([
    'label' => 'UI illustration',
    'steps' => 4,
    'interval' => 1800,
])

<div
    {{ $attributes->class('slate-ill relative min-h-[20rem] overflow-hidden rounded-xl border border-border bg-card text-card-foreground shadow-none') }}
    role="img"
    aria-label="{{ $label }}"
    x-data="{
        step: 0,
        steps: {{ (int) $steps }},
        init() {
            if (window.matchMedia('(prefers-reduced-motion: reduce)').matches) {
                this.step = Math.max(this.steps - 1, 0);
                return;
            }
            if (this.steps <= 1) return;
            this._t = setInterval(() => { this.step = (this.step + 1) % this.steps }, {{ (int) $interval }});
        },
        destroy() { clearInterval(this._t) }
    }"
>
    <div class="flex items-center gap-2 border-b border-border px-3 py-2">
        <span class="size-2 rounded-full bg-muted-foreground/35"></span>
        <span class="size-2 rounded-full bg-muted-foreground/35"></span>
        <span class="size-2 rounded-full bg-muted-foreground/35"></span>
        <span class="ml-2 truncate font-mono text-[11px] text-muted-foreground">{{ $label }}</span>
    </div>
    <div class="pointer-events-none select-none p-4 sm:p-5" aria-hidden="true">
        {{ $slot }}
    </div>
</div>
