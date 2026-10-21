{{-- x-slate-block::illustration-deploy --}}
@props([
    'label' => 'Production deploy',
    'headline' => 'main · 4f2a9c1',
    'jobs' => [
        ['title' => 'Install dependencies', 'hint' => 'composer + npm'],
        ['title' => 'Build application', 'hint' => 'vite build'],
        ['title' => 'Run tests', 'hint' => 'php artisan test'],
        ['title' => 'Deploy to production', 'hint' => 'main · forge'],
    ],
    'statuses' => ['Queued on Forge', 'Building application', 'Running the test suite', 'Ready on production'],
    'badges' => ['Queued', 'Building', 'Testing', 'Live'],
    'interval' => 1600,
])

@php
    $jobs = array_values($jobs);
    $statuses = array_values($statuses);
    $badges = array_values($badges);
    $steps = max(count($jobs), 1);
    $statusesJs = \Illuminate\Support\Js::from($statuses);
    $badgesJs = \Illuminate\Support\Js::from($badges);
@endphp

<x-slate-block::illustration-shell :label="$label" :steps="$steps" :interval="$interval" {{ $attributes }}>
    <div class="mb-4 flex items-center justify-between gap-3">
        <div>
            <p class="text-sm font-medium">{{ $headline }}</p>
            <p
                class="mt-0.5 text-xs text-muted-foreground"
                x-text="{{ $statusesJs }}[step]"
            >{{ $statuses[0] ?? '' }}</p>
        </div>
        <x-slate::badge
            variant="secondary"
            x-text="{{ $badgesJs }}[step]"
        >{{ $badges[0] ?? '' }}</x-slate::badge>
    </div>

    <ol class="space-y-2">
        @foreach ($jobs as $i => $job)
            <li
                class="flex items-start gap-3 rounded-lg border border-border bg-background px-3 py-2.5 transition-all duration-500"
                x-bind:class="step === {{ $i }}
                    ? 'border-primary/40 shadow-sm'
                    : (step > {{ $i }} ? 'opacity-100' : 'opacity-50')"
            >
                <span
                    class="mt-0.5 flex size-5 shrink-0 items-center justify-center rounded-full border text-[10px] font-medium"
                    x-bind:class="step > {{ $i }}
                        ? 'border-primary bg-primary text-primary-foreground'
                        : (step === {{ $i }} ? 'border-primary text-primary motion-safe:animate-pulse' : 'border-border text-muted-foreground')"
                    x-text="step > {{ $i }} ? '✓' : '{{ $i + 1 }}'"
                ></span>
                <div class="min-w-0">
                    <p class="text-sm font-medium">{{ $job['title'] }}</p>
                    @if (! empty($job['hint']))
                        <p class="text-xs text-muted-foreground">{{ $job['hint'] }}</p>
                    @endif
                </div>
            </li>
        @endforeach
    </ol>
</x-slate-block::illustration-shell>
