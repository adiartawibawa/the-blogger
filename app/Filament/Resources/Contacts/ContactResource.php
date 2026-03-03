<?php

namespace App\Filament\Resources\Contacts;

use App\Filament\Resources\Contacts\Pages\ManageContacts;
use App\Models\Contact;
use BackedEnum;
use Filament\Actions\Action;
use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteAction;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\ViewAction;
use Filament\Forms\Components\DateTimePicker;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\Toggle;
use Filament\Infolists\Components\IconEntry;
use Filament\Infolists\Components\TextEntry;
use Filament\Resources\Resource;
use Filament\Schemas\Components\Grid;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Columns\IconColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Filters\TernaryFilter;
use Filament\Tables\Table;
use UnitEnum;

class ContactResource extends Resource
{
    protected static ?string $model = Contact::class;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedEnvelope;

    protected static ?string $recordTitleAttribute = 'name';

    protected static string|UnitEnum|null $navigationGroup = 'Management';

    protected static ?int $navigationSort = 3;

    public static function form(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('name')
                    ->required(),
                TextInput::make('email')
                    ->label('Email address')
                    ->email()
                    ->required(),
                TextInput::make('subject')
                    ->default(null),
                Textarea::make('message')
                    ->required()
                    ->columnSpanFull(),
                Toggle::make('is_read')
                    ->required(),
                DateTimePicker::make('read_at'),
                TextInput::make('ip_address')
                    ->default(null),
            ]);
    }

    public static function infolist(Schema $schema): Schema
    {
        return $schema
            ->components([
                Section::make('Informasi Pengirim')
                    ->collapsible()
                    ->schema([
                        Grid::make(3)->schema([
                            TextEntry::make('name')->weight('bold'),
                            TextEntry::make('email')->copyable()->icon(Heroicon::OutlinedEnvelope),
                            TextEntry::make('ip_address')->label('IP Address')->badge()->color('gray'),
                        ]),
                    ])->columnSpanFull(),

                Section::make('Isi Pesan')
                    ->collapsible()
                    ->schema([
                        TextEntry::make('subject')
                            ->label('Subjek')
                            ->placeholder('Tanpa Subjek')
                            ->weight('bold'),
                        TextEntry::make('message')
                            ->label('Pesan')
                            ->markdown(),
                    ])->columnSpanFull(),

                Section::make('Status Log')
                    ->collapsed(true)
                    ->columns(3)
                    ->schema([
                        IconEntry::make('is_read')
                            ->label('Sudah Dibaca')
                            ->boolean(),
                        TextEntry::make('read_at')
                            ->label('Waktu Baca')
                            ->dateTime('d M Y H:i')
                            ->placeholder('Belum dibaca'),
                        TextEntry::make('created_at')
                            ->label('Diterima Pada')
                            ->dateTime('d M Y H:i'),
                    ])->columnSpanFull(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->recordTitleAttribute('name')
            ->columns([
                IconColumn::make('is_read')
                    ->boolean()
                    ->label('Read')
                    ->trueIcon(Heroicon::OutlinedCheckCircle)
                    ->falseIcon(Heroicon::OutlinedExclamationCircle)
                    ->trueColor('success')
                    ->falseColor('danger'),

                TextColumn::make('name')
                    ->searchable()
                    ->description(fn(Contact $record): string => $record->email)
                    ->sortable(),

                TextColumn::make('subject')
                    ->limit(40)
                    ->searchable(),

                TextColumn::make('message')
                    ->limit(60)
                    ->toggleable(),

                TextColumn::make('ip_address')
                    ->toggleable(isToggledHiddenByDefault: true),

                TextColumn::make('created_at')
                    ->dateTime('d M Y H:i')
                    ->sortable(),
            ])
            ->filters([
                TernaryFilter::make('is_read')
                    ->label('Status Baca')
                    ->trueLabel('Sudah dibaca')
                    ->falseLabel('Belum dibaca'),
            ])
            ->recordActions([
                ViewAction::make(),
                Action::make('mark_as_read')
                    ->label('Tandai Dibaca')
                    ->icon(Heroicon::OutlinedCheckCircle)
                    ->color('success')
                    ->action(fn(Contact $record) => $record->markAsRead())
                    ->visible(fn(Contact $record) => !$record->is_read)
                    ->requiresConfirmation(),
                DeleteAction::make(),
            ])
            ->toolbarActions([
                BulkActionGroup::make([
                    DeleteBulkAction::make(),
                ]),
            ])
            ->defaultSort('created_at', 'desc');
    }

    public static function getPages(): array
    {
        return [
            'index' => ManageContacts::route('/'),
        ];
    }

    public static function getNavigationBadge(): ?string
    {
        return (string) Contact::where('is_read', false)->count() ?: null;
    }

    public static function getNavigationBadgeColor(): ?string
    {
        return 'danger';
    }

    public static function canCreate(): bool
    {
        return false;
    }
}
