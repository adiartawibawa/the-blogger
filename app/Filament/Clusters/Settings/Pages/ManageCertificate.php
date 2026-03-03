<?php

namespace App\Filament\Clusters\Settings\Pages;

use App\Filament\Clusters\Settings\SettingsCluster;
use App\Settings\CertificationSettings;
use BackedEnum;
use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Repeater;
use Filament\Forms\Components\TagsInput;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Forms\Components\ViewField;
use Filament\Pages\SettingsPage;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;

class ManageCertificate extends SettingsPage
{
    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedCheckBadge;

    protected static string $settings = CertificationSettings::class;

    protected static ?string $cluster = SettingsCluster::class;

    protected static ?string $navigationLabel = 'Certifications';

    public function form(Schema $schema): Schema
    {
        return $schema
            ->components([
                Section::make('Professional Certifications')
                    ->description('Manage your verified industry credentials')
                    ->schema([
                        Repeater::make('certificate')
                            ->schema([
                                TextInput::make('title')->required()->columnSpan(2),
                                TextInput::make('issuer')->required()->columnSpan(2),

                                DatePicker::make('issuing_date')->label('Issued Date')->required()->columnSpan(2),
                                DatePicker::make('expiration_date')->label('Expiry Date (Leave empty if no expiry)')->columnSpan(2),

                                Textarea::make('description')
                                    ->rows(3)
                                    ->columnSpanFull(),

                                TagsInput::make('skills')
                                    ->placeholder('Add skill and press enter')
                                    ->columnSpanFull(),

                                FileUpload::make('badge_url')
                                    ->label('Badge Image')
                                    ->directory('badges')
                                    ->image()
                                    ->columnSpanFull(),

                                Textarea::make('badge_code')
                                    ->label('Embed Code / Script')
                                    ->helperText('Paste the iframe or script code from the certification provider (e.g., Credly, Cisco).')
                                    ->rows(3)
                                    ->live()
                                    ->afterStateUpdated(fn($state, $set) => $set('badge_preview', $state))
                                    ->columnSpanFull(),

                                ViewField::make('badge_preview')
                                    ->view('filament.forms.components.badge-preview')
                                    ->columnSpanFull(),

                                Toggle::make('is_featured')
                                    ->label('Featured on Profile')
                                    ->default(true)
                                    ->inline(false),
                            ])
                            ->columns(4)
                            ->collapsible()
                            ->collapsed(true)
                            ->cloneable()
                            ->reorderable()
                            ->defaultItems(1)
                            ->itemLabel(fn(array $state): ?string => $state['title'] ?? null),
                    ])->columnSpanFull(),
            ]);
    }
}
