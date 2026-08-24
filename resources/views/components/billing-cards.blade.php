{{-- x-slate-block::billing-cards --}}
@props([
    'planName' => 'Team',
    'planPrice' => '$29/mo',
    'planDescription' => 'Billed monthly. Cancel anytime.',
    'manageHref' => '#',
    'manageLabel' => 'Manage subscription',
    'paymentLabel' => 'Visa ending in 4242',
    'paymentHint' => 'Expires 12/28',
    'updatePaymentHref' => '#',
    'updatePaymentLabel' => 'Update card',
])

<div {{ $attributes->class('grid gap-4 lg:grid-cols-2') }}>
    <x-slate::card>
        <x-slate::card-header>
            <x-slate::card-title>Current plan</x-slate::card-title>
            <x-slate::card-description>{{ $planDescription }}</x-slate::card-description>
        </x-slate::card-header>
        <x-slate::card-content>
            <p class="text-2xl font-semibold tracking-tight">{{ $planName }}</p>
            <p class="mt-1 text-sm text-muted-foreground">{{ $planPrice }}</p>
        </x-slate::card-content>
        <x-slate::card-footer>
            <x-slate::button as="a" variant="outline" href="{{ $manageHref }}">{{ $manageLabel }}</x-slate::button>
        </x-slate::card-footer>
    </x-slate::card>

    <x-slate::card>
        <x-slate::card-header>
            <x-slate::card-title>Payment method</x-slate::card-title>
            <x-slate::card-description>Used for renewals and invoices.</x-slate::card-description>
        </x-slate::card-header>
        <x-slate::card-content>
            <p class="text-sm font-medium">{{ $paymentLabel }}</p>
            @if ($paymentHint)
                <p class="mt-1 text-xs text-muted-foreground">{{ $paymentHint }}</p>
            @endif
        </x-slate::card-content>
        <x-slate::card-footer>
            <x-slate::button as="a" variant="outline" href="{{ $updatePaymentHref }}">{{ $updatePaymentLabel }}</x-slate::button>
        </x-slate::card-footer>
    </x-slate::card>

    {{ $slot }}
</div>
