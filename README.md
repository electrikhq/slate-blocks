# electrik/slate-blocks

Curated Blade **blocks** for [Electrik Slate](https://slate.electrik.dev) — marketing, auth, and application sections composed only from `<x-slate::*>` primitives.

~24 blocks in v1. Not a page builder and not merged into Slate core.

## Requirements

- PHP 8.3+
- Laravel 12+
- `electrik/slate` ^3.0@alpha

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

Catalog metadata (docs gallery / MCP):

```php
use Electrik\SlateBlocks\Blocks;

Blocks::all();
Blocks::find('hero');
```

## License

MIT
