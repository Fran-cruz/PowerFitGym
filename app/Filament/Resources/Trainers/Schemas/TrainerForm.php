<?php

namespace App\Filament\Resources\Trainers\Schemas;

use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\Toggle;
use Filament\Schemas\Schema;

class TrainerForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('name')
                    ->required(),
                TextInput::make('specialty')
                    ->required(),
                Textarea::make('certifications')
                    ->required()
                    ->columnSpanFull(),
                TextInput::make('years_experience')
                    ->required()
                    ->numeric(),
                Textarea::make('biography')
                    ->required()
                    ->columnSpanFull(),
                TextInput::make('image_url')
                    ->label('Image URL')
                    ->url()
                    ->required(),
                Toggle::make('is_active')
                    ->required(),
                TextInput::make('sort_order')
                    ->required()
                    ->numeric()
                    ->default(0),
            ]);
    }
}
