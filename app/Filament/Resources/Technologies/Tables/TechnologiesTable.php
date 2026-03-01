<?php

namespace App\Filament\Resources\Technologies\Tables;

use App\Models\Technology;
use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Tables\Columns\IconColumn;
use Filament\Tables\Columns\ImageColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Filters\SelectFilter;
use Filament\Tables\Table;

class TechnologiesTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([
                ImageColumn::make('icon_url')
                    ->label('Icon')
                    ->circular()
                    ->size(32),

                TextColumn::make('name')
                    ->searchable()
                    ->sortable(),

                TextColumn::make('category')
                    ->badge()
                    ->formatStateUsing(fn($state) => Technology::categories()[$state] ?? $state),

                TextColumn::make('proficiency')
                    ->suffix('%')
                    ->sortable(),

                IconColumn::make('is_featured')
                    ->boolean()
                    ->label('Featured'),

                TextColumn::make('projects_count')
                    ->counts('projects')
                    ->label('Projects'),
            ])
            ->filters([
                SelectFilter::make('category')
                    ->options(Technology::categories()),
            ])
            ->recordActions([
                EditAction::make(),
            ])
            ->toolbarActions([
                BulkActionGroup::make([
                    DeleteBulkAction::make(),
                ]),
            ])->reorderable('sort_order');
    }
}
