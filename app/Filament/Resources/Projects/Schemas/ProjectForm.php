<?php

namespace App\Filament\Resources\Projects\Schemas;

use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Hidden;
use Filament\Forms\Components\Repeater;
use Filament\Forms\Components\RichEditor;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Components\Grid;
use Filament\Schemas\Components\Tabs;
use Filament\Schemas\Components\Tabs\Tab;
use Filament\Schemas\Schema;
use Illuminate\Support\Str;

class ProjectForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Tabs::make('Project')
                    ->tabs([
                        Tab::make('Informasi Utama')
                            ->schema([
                                TextInput::make('title')
                                    ->required()
                                    ->maxLength(255)
                                    ->live(onBlur: true)
                                    ->afterStateUpdated(fn($state, callable $set) =>
                                    $set('slug', Str::slug($state))),

                                TextInput::make('slug')
                                    ->required()
                                    ->unique(ignoreRecord: true)
                                    ->maxLength(255),

                                Textarea::make('excerpt')
                                    ->rows(3)
                                    ->maxLength(500)
                                    ->placeholder('Deskripsi singkat project...'),

                                RichEditor::make('description')
                                    ->required()
                                    ->columnSpanFull()
                                    ->toolbarButtons([
                                        'attachFiles',
                                        'blockquote',
                                        'bold',
                                        'bulletList',
                                        'codeBlock',
                                        'h2',
                                        'h3',
                                        'italic',
                                        'link',
                                        'orderedList',
                                        'redo',
                                        'strike',
                                        'underline',
                                        'undo',
                                    ]),

                                Grid::make(2)->schema([
                                    TextInput::make('role')
                                        ->placeholder('Full Stack Developer'),

                                    TextInput::make('client')
                                        ->placeholder('Nama klien / company'),

                                    TextInput::make('demo_url')
                                        ->url()
                                        ->placeholder('https://demo.example.com'),

                                    TextInput::make('repo_url')
                                        ->url()
                                        ->placeholder('https://github.com/...'),

                                    DatePicker::make('completed_at')
                                        ->label('Selesai Pada'),

                                    Select::make('status')
                                        ->options([
                                            'draft' => 'Draft',
                                            'published' => 'Published',
                                            'featured' => 'Featured',
                                        ])
                                        ->default('draft')
                                        ->required(),
                                ]),

                                Select::make('technologies')
                                    ->multiple()
                                    ->relationship('technologies', 'name')
                                    ->preload()
                                    ->searchable()
                                    ->columnSpanFull(),
                            ]),

                        Tab::make('Media')
                            ->schema([
                                FileUpload::make('thumbnail')
                                    ->image()
                                    ->directory('projects/thumbnails')
                                    ->imageEditor()
                                    ->maxSize(2048),

                                // ProjectForm.php

                                Repeater::make('images')
                                    ->relationship()
                                    ->schema([
                                        FileUpload::make('path')
                                            ->label('Image')
                                            ->image()
                                            ->directory('projects/gallery')
                                            ->required(),

                                        TextInput::make('alt')
                                            ->label('Alt Text'),

                                        TextInput::make('caption'),

                                        Hidden::make('sort_order')
                                            ->default(0),
                                    ])
                                    ->reorderable('sort_order')
                                    ->columnSpanFull(),
                            ]),

                        Tab::make('Settings')
                            ->schema([
                                TextInput::make('sort_order')
                                    ->numeric()
                                    ->default(0),
                            ]),
                    ])
                    ->columnSpanFull(),
            ]);
    }
}
