<?php

namespace App\Filament\Resources\Technologies\Schemas;

use App\Models\Technology;
use Filament\Forms\Components\ColorPicker;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Schemas\Components\Grid;
use Filament\Schemas\Schema;
use Illuminate\Support\Str;

class TechnologyForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Grid::make(2)->schema([
                    TextInput::make('name')
                        ->required()
                        ->maxLength(100)
                        ->live(onBlur: true)
                        ->afterStateUpdated(fn($state, callable $set) => $set('slug', Str::slug($state))),

                    TextInput::make('slug')
                        ->required()
                        ->unique(ignoreRecord: true),

                    Select::make('category')
                        ->options(Technology::categories())
                        ->required(),

                    ColorPicker::make('color')
                        ->label('Brand Color'),

                    FileUpload::make('icon')
                        ->label('Icon / Logo')
                        ->image()
                        ->directory('technologies')
                        ->maxSize(512),

                    TextInput::make('proficiency')
                        ->numeric()
                        ->minValue(0)
                        ->maxValue(100)
                        ->suffix('%')
                        ->default(80),

                    TextInput::make('sort_order')
                        ->numeric()
                        ->default(0),

                    Toggle::make('is_featured')
                        ->label('Tampilkan di Home'),
                ])
                    ->columnSpanFull(),
            ]);
    }
}
