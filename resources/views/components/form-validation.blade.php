{{-- x-slate-block::form-validation --}}
@props([
    'title' => 'Update email',
    'description' => 'Progressive errorMessage props for static demos and Livewire forms.',
])

<div {{ $attributes->class('flex min-h-[28rem] items-center justify-center bg-muted/30 p-6 sm:p-10') }}>
    <x-slate::card class="w-full max-w-md">
        <x-slate::card-header>
            <x-slate::card-title>{{ $title }}</x-slate::card-title>
            @if ($description)
                <x-slate::card-description>{{ $description }}</x-slate::card-description>
            @endif
        </x-slate::card-header>
        <x-slate::card-content class="space-y-4">
            @if ($slot->isNotEmpty())
                {{ $slot }}
            @else
                <x-slate::input
                    id="block-form-email"
                    type="email"
                    label="Email"
                    value="not-an-email"
                    error-message="Enter a valid email address."
                />
                <x-slate::input
                    id="block-form-confirm"
                    type="email"
                    label="Confirm email"
                    description="Must match the address above."
                    error-message="Emails do not match."
                />
                <x-slate::checkbox
                    id="block-form-marketing"
                    label="Product updates"
                    description="Occasional release notes."
                />
            @endif
        </x-slate::card-content>
        <x-slate::card-footer class="justify-end gap-2 border-t">
            @if (isset($actions))
                {{ $actions }}
            @else
                <x-slate::button variant="outline">Cancel</x-slate::button>
                <x-slate::button>Save</x-slate::button>
            @endif
        </x-slate::card-footer>
    </x-slate::card>
</div>
