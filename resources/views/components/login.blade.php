{{-- x-slate-block::login --}}
@props([
    'title' => 'Sign in',
    'description' => 'Enter your credentials to continue.',
    'emailId' => 'block-login-email',
    'passwordId' => 'block-login-password',
    'rememberId' => 'block-login-remember',
    'forgotHref' => '#',
    'forgotLabel' => 'Forgot?',
    'submitLabel' => 'Sign in',
    'oauthLabel' => 'Continue with GitHub',
    'showOauth' => true,
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
                <x-slate::input :id="$emailId" type="email" label="Email" placeholder="you@example.com" />
                <x-slate::input :id="$passwordId" type="password" label="Password" value="password" />

                <div class="flex items-center justify-between gap-3">
                    <div class="flex items-center gap-2">
                        <x-slate::checkbox :id="$rememberId" />
                        <x-slate::field-label :for="$rememberId">Remember me</x-slate::field-label>
                    </div>
                    <a href="{{ $forgotHref }}" class="text-sm text-muted-foreground underline-offset-4 hover:text-foreground hover:underline">{{ $forgotLabel }}</a>
                </div>

                <x-slate::button type="submit" class="w-full">{{ $submitLabel }}</x-slate::button>
                @if ($showOauth)
                    <x-slate::button type="button" variant="outline" class="w-full">{{ $oauthLabel }}</x-slate::button>
                @endif
            </form>
        @endif
    </div>
</div>
