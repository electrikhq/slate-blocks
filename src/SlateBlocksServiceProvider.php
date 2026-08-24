<?php

namespace Electrik\SlateBlocks;

use Illuminate\Support\ServiceProvider;

class SlateBlocksServiceProvider extends ServiceProvider
{
    public function boot(): void
    {
        $this->loadViewsFrom(__DIR__.'/../resources/views', 'slate-block');
    }
}
