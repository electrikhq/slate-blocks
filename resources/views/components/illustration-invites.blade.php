{{-- x-slate-block::illustration-invites --}}
@props([
    'label' => 'Team invites',
    'title' => 'Acme workspace',
    'description' => 'Invite teammates to this team',
    'people' => [
        ['name' => 'Maya Chen', 'email' => 'maya@studio.dev', 'initials' => 'MC'],
        ['name' => 'Jules Park', 'email' => 'jules@studio.dev', 'initials' => 'JP'],
        ['name' => 'Sam Ortiz', 'email' => 'sam@studio.dev', 'initials' => 'SO'],
        ['name' => 'Riley Ng', 'email' => 'riley@studio.dev', 'initials' => 'RN'],
    ],
    'interval' => 1700,
])

@php
    $people = array_values($people);
    $steps = max(count($people), 1);
@endphp

<x-slate-block::illustration-shell :label="$label" :steps="$steps" :interval="$interval" {{ $attributes }}>
    <div class="mb-4 flex items-center justify-between gap-3">
        <div>
            <p class="text-sm font-medium">{{ $title }}</p>
            @if ($description)
                <p class="text-xs text-muted-foreground">{{ $description }}</p>
            @endif
        </div>
        <x-slate::avatar-group>
            @foreach ($people as $i => $person)
                <x-slate::avatar
                    size="sm"
                    :fallback="$person['initials'] ?? strtoupper(substr($person['name'] ?? '?', 0, 2))"
                    x-bind:class="step >= {{ $i }} ? 'opacity-100' : 'opacity-0'"
                    class="transition-opacity duration-500"
                />
            @endforeach
        </x-slate::avatar-group>
    </div>

    <ul class="space-y-2">
        @foreach ($people as $i => $person)
            <li
                class="flex items-center justify-between gap-3 rounded-lg border border-border bg-background px-3 py-2 transition-all duration-500"
                x-bind:class="step >= {{ $i }} ? 'opacity-100 translate-y-0' : 'opacity-0 translate-y-1'"
            >
                <div class="flex min-w-0 items-center gap-2">
                    <x-slate::avatar
                        size="sm"
                        :fallback="$person['initials'] ?? strtoupper(substr($person['name'] ?? '?', 0, 2))"
                    />
                    <div class="min-w-0">
                        <p class="truncate text-sm font-medium">{{ $person['name'] }}</p>
                        @if (! empty($person['email']))
                            <p class="truncate text-xs text-muted-foreground">{{ $person['email'] }}</p>
                        @endif
                    </div>
                </div>
                <x-slate::badge
                    variant="secondary"
                    x-text="step > {{ $i }} ? 'Joined' : (step === {{ $i }} ? 'Pending' : 'Queued')"
                >Queued</x-slate::badge>
            </li>
        @endforeach
    </ul>
</x-slate-block::illustration-shell>
