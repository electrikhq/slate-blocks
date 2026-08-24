{{-- x-slate-block::register --}}
@props([
    'title' => 'Create an account',
    'description' => 'Start building with Slate.',
    'nameId' => 'block-register-name',
    'emailId' => 'block-register-email',
    'passwordId' => 'block-register-password',
    'termsId' => 'block-register-terms',
    'submitLabel' => 'Create account',
    'termsLabel' => 'I agree to the terms and privacy policy',
])

<div {{ $attributes->class('flex min-h-[28rem] items-center justify-center bg-muted/40 p-6 sm:p-10') }}>
    <div class="w-full max-w-md rounded-xl border border-border bg-background p-6 shadow-sm">
        <div class="mb-6 space-y-1">
            <h2 class="text-2xl font-semibold tracking-tight">{{ $title }}</h2>
            @if ($description)
                <p class="text-sm text-muted-foreground">{{ $description }}</p>
            @endif
        </div>

        @if ($slot->isNotEmpty())
            {{ $slot }}
        @else
            <form class="space-y-4" onsubmit="return false">
                <x-slate::input :id="$nameId" label="Name" placeholder="Jane Doe" />
                <x-slate::input :id="$emailId" type="email" label="Email" placeholder="you@example.com" />
                <x-slate::input :id="$passwordId" type="password" label="Password" />

                <div class="flex items-start gap-2">
                    <x-slate::checkbox :id="$termsId" class="mt-0.5" />
                    <x-slate::field-label :for="$termsId">{{ $termsLabel }}</x-slate::field-label>
                </div>

                <x-slate::button type="submit" class="w-full">{{ $submitLabel }}</x-slate::button>
            </form>
        @endif
    </div>
</div>
