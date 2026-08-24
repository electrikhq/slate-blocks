{{-- x-slate-block::invite-banner --}}
@props([
    'title' => 'Invite your team',
    'description' => 'Share workspace access with teammates.',
    'actionLabel' => 'Invite members',
    'actionHref' => '#',
])

<div {{ $attributes->class('flex flex-col gap-4 rounded-xl border border-border bg-muted/30 p-4 sm:flex-row sm:items-center sm:justify-between') }}>
    <div class="min-w-0">
        <p class="text-sm font-medium">{{ $title }}</p>
        @if ($description)
            <p class="mt-1 text-sm text-muted-foreground">{{ $description }}</p>
        @endif
        {{ $slot }}
    </div>
    <div class="shrink-0">
        @if (isset($action))
            {{ $action }}
        @else
            <x-slate::button as="a" size="sm" href="{{ $actionHref }}">{{ $actionLabel }}</x-slate::button>
        @endif
    </div>
</div>
