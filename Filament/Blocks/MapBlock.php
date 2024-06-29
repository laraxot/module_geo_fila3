<?php

declare(strict_types=1);

namespace Modules\Geo\Filament\Blocks;

use Filament\Forms\Components\Builder\Block;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;

// use Modules\Blog\Models\Article;

class MapBlock
{
    public static function make(
        string $name = 'map_block',
        string $context = 'form',
    ): Block {
        return Block::make($name)
            ->schema([
                /*
                Select::make('article_id')
                    ->label('Article')
                    ->options(Article::published()->orderBy('title')->pluck('title', 'id'))
                    ->required(),
                */
                TextInput::make('text')
                    ->label('Link text (optional)'),
            ])
            ->label('Map')
            ->columns('form' === $context ? 2 : 1);
    }
}
