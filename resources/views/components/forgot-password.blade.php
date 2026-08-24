{{-- x-slate-block::forgot-password --}}
@props([
    'title' => 'Reset password',
    'description' => 'Enter your email and we will send a reset link.',
    'emailId' => 'block-forgot-email',
    'submitLabel' => 'Send reset link',
    'backHref' => '#',
    'backLabel' => 'Back to sign in',
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
                <x-slate::button type="submit" class="w-full">{{ $submitLabel }}</x-slate::button>
            </form>
        @endif

        <p class="mt-4 text-center text-sm text-muted-foreground">
            <a href="{{ $backHref }}" class="underline-offset-4 hover:text-foreground hover:underline">{{ $backLabel }}</a>
        </p>
    </div>
</div>
