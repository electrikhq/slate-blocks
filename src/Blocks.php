<?php

namespace Electrik\SlateBlocks;

class Blocks
{
    /**
     * @return list<array{id: string, title: string, description: string, category: string}>
     */
    public static function all(): array
    {
        /** @var list<array{id: string, title: string, description: string, category: string}> $blocks */
        $blocks = require __DIR__.'/../resources/meta/blocks.php';

        return $blocks;
    }

    /**
     * @return array{id: string, title: string, description: string, category: string}|null
     */
    public static function find(string $id): ?array
    {
        foreach (self::all() as $block) {
            if ($block['id'] === $id) {
                return $block;
            }
        }

        return null;
    }
}
