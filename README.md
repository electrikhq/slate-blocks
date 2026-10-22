# electrik/slate-blocks

Clean, modern building blocks for [Electrik Slate](https://slate.electrik.dev). Copy them into your Blade views. Composed from `<x-slate::*>` primitives.

~24 blocks. Not a page builder. Not merged into Slate core.

Animated UI scenes for landing pages live in [`electrik/slate-illustrations`](https://github.com/electrikhq/slate-illustrations). Decorative. Not live screens.

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
```

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

**Need animated UI for a landing page?** Install [`electrik/slate-illustrations`](https://github.com/electrikhq/slate-illustrations).

**Need the full SaaS shell?** Blocks compose with [Electrik](https://electrik.dev) (auth, teams, Stripe) — [install](https://electrik.dev/install).

Catalog metadata (docs gallery / MCP):

```php
use Electrik\SlateBlocks\Blocks;

Blocks::all();
Blocks::find('hero');
```

## License

MIT
