# electrik/slate-blocks

Curated Blade **blocks** for [Electrik Slate](https://slate.electrik.dev) — marketing, auth, and application sections composed only from `<x-slate::*>` primitives.

~30 blocks in v0.2, including six animated **illustrations** for marketing bentos. Not a page builder and not merged into Slate core.

## Requirements

- PHP 8.3+
- Laravel 12+
- `electrik/slate` ^3.0

## Install

```bash
composer require electrik/slate-blocks
```

Path-link (monorepo / local):

```json
{
  "repositories": [
    { "type": "path", "url": "../slate-blocks", "options": { "symlink": true } }
  ],
  "require": {
    "electrik/slate-blocks": "@dev"
  }
}
```

## Tailwind

Scan block views so classes are generated:

```css
@source '../../vendor/electrik/slate-blocks/resources/views/**/*.blade.php';
@import '../../vendor/electrik/slate-blocks/resources/css/illustrations.css';
```

The `@import` is only required for illustration marquee / sparkline motion. Alpine-driven scenes still work without it.

## Usage

```blade
<x-slate-block::hero
    title="Ship your SaaS"
    description="Auth, teams, and billing on Laravel."
    primary-href="/install"
    primary-label="Install guide"
    secondary-href="https://demo.electrik.dev"
    secondary-label="Live demo"
/>
```

Decorative UI mockups for heroes and feature grids. Empty tags use sample copy; pass arrays to make the scene about your product:

```blade
<x-slate-block::illustration-deploy
    headline="main · ship-42"
    :jobs="[
        ['title' => 'Install dependencies', 'hint' => 'composer + npm'],
        ['title' => 'Deploy to production', 'hint' => 'Forge · acme.com'],
    ]"
/>

<x-slate-block::illustration-billing
    plan-name="Studio"
    :amounts="['$4,120', '$4,480', '$4,910']"
    :seats="['8 / 20', '11 / 20', '14 / 20']"
/>

<x-slate-block::illustration-invites
    title="Acme workspace"
    :people="[
        ['name' => 'Priya Shah', 'email' => 'priya@acme.dev', 'initials' => 'PS'],
    ]"
/>

<x-slate-block::illustration-kanban
    :cards="[
        ['title' => 'Checkout flow', 'owner' => 'PS', 'lane' => [0, 1, 2]],
    ]"
/>

<x-slate-block::illustration-activity
    :events="[
        ['time' => '09:16', 'title' => 'Invoice paid', 'detail' => 'Stripe · $149.00'],
    ]"
/>

<x-slate-block::illustration-chat
    name="Acme assistant"
    :messages="[
        ['role' => 'user', 'text' => 'Can we bill the workspace?'],
        ['role' => 'assistant', 'text' => 'Yes. Cashier sits on the team.'],
    ]"
/>
```

They are not product widgets — `pointer-events` are off, and `prefers-reduced-motion` freezes the last frame.

Prop tables for every illustration: [slate.electrik.dev/docs/illustrations](https://slate.electrik.dev/docs/illustrations).

**Need the full SaaS shell?** Blocks compose with [Electrik](https://electrik.dev) (auth, teams, Stripe) — [install](https://electrik.dev/install).

Catalog metadata (docs gallery / MCP):

```php
use Electrik\SlateBlocks\Blocks;

Blocks::all();
Blocks::find('hero');
```

## License

MIT
