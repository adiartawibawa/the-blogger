<?php

namespace App\Filament\Clusters\Settings\Pages;

use App\Filament\Clusters\Settings\SettingsCluster;
use App\Settings\ExperienceSettings;
use BackedEnum;
use Filament\Forms\Components\Repeater;
use Filament\Forms\Components\TagsInput;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Pages\SettingsPage;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;

class ManageExperiences extends SettingsPage
{
    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedListBullet;

    protected static string $settings = ExperienceSettings::class;

    protected static ?string $cluster = SettingsCluster::class;

    protected static ?string $navigationLabel = 'Experiences';

    public function form(Schema $schema): Schema
    {
        return $schema
            ->components([
                Section::make('Working Experiences')
                    ->description('Manage your working experiences')
                    ->schema([
                        Repeater::make('experiences')
                            ->label('Work Experiences')
                            ->schema([
                                TextInput::make('role')
                                    ->label('Role')
                                    ->placeholder('Contoh: Senior Unity Developer')
                                    ->required()
                                    ->columnSpan(2),

                                TextInput::make('company')
                                    ->label('Company')
                                    ->placeholder('Contoh: Dinas PUPR')
                                    ->required()
                                    ->columnSpan(2),

                                TextInput::make('period')
                                    ->label('Period')
                                    ->placeholder('Contoh: 2013 — 2019')
                                    ->required()
                                    ->columnSpan(2),

                                Textarea::make('description')
                                    ->label('Description')
                                    ->rows(3)
                                    ->required()
                                    ->columnSpanFull(),

                                TagsInput::make('technologies')
                                    ->label('Technologies')
                                    ->placeholder('Add technologies...')
                                    ->helperText('Press enter or use coma to add item.')
                                    ->required()
                                    ->columnSpanFull(),
                            ])
                            ->itemLabel(fn(array $state): ?string => $state['role'] ?? null)
                            ->collapsible()
                            ->collapsed(true)
                            ->cloneable()
                            ->reorderable()
                            ->defaultItems(1),
                    ])->columnSpanFull()
            ]);
    }
}
