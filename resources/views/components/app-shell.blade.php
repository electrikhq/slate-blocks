{{-- x-slate-block::app-shell --}}
@props([
    'brand' => 'Acme Inc',
])

<x-slate::app-shell {{ $attributes->class('min-h-[28rem] overflow-hidden rounded-none border-y border-border bg-background') }}>
    <x-slot:header>
        @if (isset($header))
            {{ $header }}
        @else
            <x-slate::button
                type="button"
                variant="ghost"
                size="icon-sm"
                class="md:hidden"
                x-on:click="open = !open"
                aria-label="Toggle sidebar"
            >
                <svg class="size-4" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" aria-hidden="true">
                    <path d="M4 6h16M4 12h16M4 18h16" />
                </svg>
            </x-slate::button>
            <div class="flex flex-1 items-center justify-between gap-4">
                <p class="text-sm font-medium">{{ $brand }}</p>
                <div class="flex items-center gap-2">
                    <x-slate::badge variant="secondary">Alpha</x-slate::badge>
                    <x-slate::button size="sm" variant="outline">Invite</x-slate::button>
                </div>
            </div>
        @endif
    </x-slot:header>

    <x-slot:sidebar>
        @if (isset($sidebar))
            {{ $sidebar }}
        @else
            <aside class="flex h-full w-56 flex-col border-e border-border bg-sidebar text-sidebar-foreground">
                <div class="border-b border-sidebar-border px-3 py-3">
                    <p class="text-xs font-medium text-muted-foreground">Workspace</p>
                </div>
                <nav class="flex flex-1 flex-col gap-0.5 p-2">
                    <span class="flex h-8 items-center rounded-md bg-sidebar-accent px-2.5 text-sm font-medium text-sidebar-accent-foreground">Overview</span>
                    <span class="flex h-8 items-center rounded-md px-2.5 text-sm text-muted-foreground">Projects</span>
                    <span class="flex h-8 items-center rounded-md px-2.5 text-sm text-muted-foreground">Billing</span>
                    <span class="flex h-8 items-center rounded-md px-2.5 text-sm text-muted-foreground">Members</span>
                </nav>
            </aside>
        @endif
    </x-slot:sidebar>

    <x-slot:main>
        @if ($slot->isNotEmpty())
            {{ $slot }}
        @else
            <div class="space-y-6 p-6">
                <div>
                    <h2 class="text-xl font-semibold tracking-tight">Overview</h2>
                    <p class="mt-1 text-sm text-muted-foreground">A compact app shell built from Slate primitives.</p>
                </div>
                <div class="grid gap-4 sm:grid-cols-3">
                    @foreach ([['Revenue', '$12.4k'], ['Active', '318'], ['Deploys', '24']] as [$label, $value])
                        <div class="rounded-xl border border-border bg-card p-4">
                            <p class="text-xs text-muted-foreground">{{ $label }}</p>
                            <p class="mt-2 text-2xl font-semibold tracking-tight">{{ $value }}</p>
                        </div>
                    @endforeach
                </div>
                <x-slate::card>
                    <x-slate::card-header>
                        <x-slate::card-title>Recent activity</x-slate::card-title>
                        <x-slate::card-description>Latest events in this workspace.</x-slate::card-description>
                    </x-slate::card-header>
                    <x-slate::card-content class="space-y-3 text-sm">
                        <div class="flex items-center justify-between gap-3">
                            <span>Deploy succeeded</span>
                            <x-slate::badge variant="outline">2m ago</x-slate::badge>
                        </div>
                        <div class="flex items-center justify-between gap-3">
                            <span>Invite accepted</span>
                            <x-slate::badge variant="outline">1h ago</x-slate::badge>
                        </div>
                        <div class="flex items-center justify-between gap-3">
                            <span>Settings updated</span>
                            <x-slate::badge variant="outline">Yesterday</x-slate::badge>
                        </div>
                    </x-slate::card-content>
                </x-slate::card>
            </div>
        @endif
    </x-slot:main>
</x-slate::app-shell>
