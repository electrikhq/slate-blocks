{{-- x-slate-block::confirm-dialog --}}
@props([
    'triggerLabel' => 'Delete workspace',
    'title' => 'Are you sure?',
    'description' => 'This will permanently delete the workspace and remove all members.',
    'confirmLabel' => 'Delete',
    'cancelLabel' => 'Cancel',
])

<div {{ $attributes->class('flex min-h-[16rem] items-center justify-center bg-muted/30 p-6') }}>
    <x-slate::alert-dialog>
        <x-slate::alert-dialog-trigger>
            <x-slate::button variant="destructive">{{ $triggerLabel }}</x-slate::button>
        </x-slate::alert-dialog-trigger>
        <x-slate::alert-dialog-content
            :title="$title"
            :description="$description"
        >
            <x-slot:footer>
                @if (isset($footer))
                    {{ $footer }}
                @else
                    <x-slate::alert-dialog-cancel>
                        <x-slate::button variant="outline">{{ $cancelLabel }}</x-slate::button>
                    </x-slate::alert-dialog-cancel>
                    <x-slate::alert-dialog-action>
                        <x-slate::button variant="destructive">{{ $confirmLabel }}</x-slate::button>
                    </x-slate::alert-dialog-action>
                @endif
            </x-slot:footer>
        </x-slate::alert-dialog-content>
    </x-slate::alert-dialog>
    {{ $slot }}
</div>
