{{-- x-slate-block::toast-action --}}
@props([
    'title' => 'Publish release',
    'description' => 'Dispatch slate-toast from anywhere after mounting a toaster.',
])

<div {{ $attributes->class('flex min-h-[22rem] items-center justify-center bg-muted/30 p-6 sm:p-10') }}>
    <x-slate::card class="w-full max-w-md">
        <x-slate::card-header>
            <x-slate::card-title>{{ $title }}</x-slate::card-title>
            @if ($description)
                <x-slate::card-description>{{ $description }}</x-slate::card-description>
            @endif
        </x-slate::card-header>
        <x-slate::card-content class="space-y-3 text-sm text-muted-foreground">
            @if ($slot->isNotEmpty())
                {{ $slot }}
            @else
                <p>Mount <code class="rounded bg-muted px-1 py-0.5 font-mono text-xs text-foreground">&lt;x-slate::toaster /&gt;</code> once in your layout, then fire browser events from buttons or Livewire.</p>
            @endif
        </x-slate::card-content>
        <x-slate::card-footer class="flex flex-wrap gap-2 border-t">
            @if (isset($actions))
                {{ $actions }}
            @else
                <x-slate::button
                    type="button"
                    @click="$dispatch('slate-toast', { title: 'Published', description: '3.0.0-alpha.2 is live.', variant: 'success' })"
                >
                    Publish
                </x-slate::button>
                <x-slate::button
                    type="button"
                    variant="outline"
                    @click="$dispatch('slate-toast', { title: 'Queued', description: 'Deploy will start in a moment.' })"
                >
                    Queue deploy
                </x-slate::button>
                <x-slate::button
                    type="button"
                    variant="destructive"
                    @click="$dispatch('slate-toast', { title: 'Failed', description: 'Rollback recommended.', variant: 'destructive' })"
                >
                    Simulate error
                </x-slate::button>
            @endif
        </x-slate::card-footer>
    </x-slate::card>
</div>
