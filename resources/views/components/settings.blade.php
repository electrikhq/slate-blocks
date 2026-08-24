{{-- x-slate-block::settings --}}
@props([
    'title' => 'Settings',
    'description' => 'Manage your profile and notification preferences.',
])

<div {{ $attributes->class('bg-muted/30 p-6 sm:p-10') }}>
    <div class="mx-auto max-w-2xl space-y-6">
        <div>
            <h2 class="text-2xl font-semibold tracking-tight">{{ $title }}</h2>
            @if ($description)
                <p class="mt-1 text-sm text-muted-foreground">{{ $description }}</p>
            @endif
        </div>

        @if ($slot->isNotEmpty())
            {{ $slot }}
        @else
            <x-slate::card>
                <x-slate::card-header>
                    <x-slate::card-title>Profile</x-slate::card-title>
                    <x-slate::card-description>Public details shown on comments and invites.</x-slate::card-description>
                </x-slate::card-header>
                <x-slate::card-content class="grid gap-4 sm:grid-cols-2">
                    <x-slate::input id="block-settings-name" label="Display name" value="Jane Doe" />
                    <x-slate::input id="block-settings-handle" label="Username" value="jane" />
                    <x-slate::textarea id="block-settings-bio" class="sm:col-span-2" label="Bio" rows="3" placeholder="Short bio…" />
                </x-slate::card-content>
                <x-slate::card-footer class="justify-end gap-2 border-t">
                    <x-slate::button variant="outline">Cancel</x-slate::button>
                    <x-slate::button>Save</x-slate::button>
                </x-slate::card-footer>
            </x-slate::card>

            <x-slate::card>
                <x-slate::card-header>
                    <x-slate::card-title>Notifications</x-slate::card-title>
                    <x-slate::card-description>Choose what we send you.</x-slate::card-description>
                </x-slate::card-header>
                <x-slate::card-content class="space-y-5">
                    <div class="flex items-start justify-between gap-4">
                        <div>
                            <p class="text-sm font-medium">Comments</p>
                            <p class="text-xs text-muted-foreground">When someone mentions you.</p>
                        </div>
                        <x-slate::switch id="block-settings-comments" checked />
                    </div>
                    <div class="flex items-start justify-between gap-4">
                        <div>
                            <p class="text-sm font-medium">Deploys</p>
                            <p class="text-xs text-muted-foreground">Build success and failures.</p>
                        </div>
                        <x-slate::switch id="block-settings-deploys" checked />
                    </div>
                    <div class="flex items-start justify-between gap-4">
                        <div>
                            <p class="text-sm font-medium">Marketing</p>
                            <p class="text-xs text-muted-foreground">Occasional product notes.</p>
                        </div>
                        <x-slate::switch id="block-settings-marketing" />
                    </div>
                </x-slate::card-content>
            </x-slate::card>

            <x-slate-block::danger-zone
                title="Danger zone"
                description="Archive this workspace and remove all members."
                action-label="Archive"
            />
        @endif
    </div>
</div>
