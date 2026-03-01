<?php

namespace App\Filament\Resources\Posts\Schemas;

use Filament\Forms\Components\ColorPicker;
use Filament\Forms\Components\DateTimePicker;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\MarkdownEditor;
use Filament\Forms\Components\RichEditor;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Schemas\Components\Grid;
use Filament\Schemas\Components\Tabs;
use Filament\Schemas\Components\Tabs\Tab;
use Filament\Schemas\Schema;
use Illuminate\Support\Str;

class PostForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Tabs::make('Post')
                    ->tabs([
                        Tab::make('Konten')
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

                                Grid::make(2)->schema([
                                    Select::make('category_id')
                                        ->relationship('category', 'name')
                                        ->createOptionForm([
                                            TextInput::make('name')->required(),
                                            ColorPicker::make('color'),
                                        ])
                                        ->searchable()
                                        ->preload(),

                                    Select::make('tags')
                                        ->multiple()
                                        ->relationship('tags', 'name')
                                        ->createOptionForm([
                                            TextInput::make('name')->required(),
                                        ])
                                        ->searchable()
                                        ->preload(),
                                ]),

                                Textarea::make('excerpt')
                                    ->rows(3)
                                    ->maxLength(500),

                                Select::make('content_format')
                                    ->options(['markdown' => 'Markdown', 'html' => 'HTML'])
                                    ->default('markdown')
                                    ->required(),

                                MarkdownEditor::make('content')
                                    ->required()
                                    ->columnSpanFull()
                                    ->visible(fn($get) => $get('content_format') === 'markdown')
                                    ->toolbarButtons([
                                        'attachFiles',
                                        'blockquote',
                                        'bold',
                                        'bulletList',
                                        'codeBlock',
                                        'heading',
                                        'italic',
                                        'link',
                                        'orderedList',
                                        'redo',
                                        'strike',
                                        'table',
                                        'undo',
                                    ]),

                                RichEditor::make('content')
                                    ->required()
                                    ->columnSpanFull()
                                    ->visible(fn($get) => $get('content_format') === 'html'),
                            ]),

                        Tab::make('Media & Status')
                            ->schema([
                                FileUpload::make('cover_image')
                                    ->image()
                                    ->directory('blog/covers')
                                    ->imageResizeMode('cover')
                                    ->imageCropAspectRatio('16:9')
                                    ->imageResizeTargetWidth('1200')
                                    ->imageResizeTargetHeight('630')
                                    ->maxSize(2048),

                                Grid::make(2)->schema([
                                    Select::make('status')
                                        ->options([
                                            'draft' => 'Draft',
                                            'published' => 'Published',
                                            'scheduled' => 'Scheduled',
                                        ])
                                        ->default('draft')
                                        ->required(),

                                    DateTimePicker::make('published_at')
                                        ->label('Tanggal Publish')
                                        ->seconds(false),

                                    Toggle::make('is_featured')
                                        ->label('Featured Post'),
                                ]),
                            ]),

                        Tab::make('SEO')
                            ->schema([
                                TextInput::make('meta_title')
                                    ->maxLength(60)
                                    ->placeholder('SEO Title (opsional)'),

                                Textarea::make('meta_description')
                                    ->rows(3)
                                    ->maxLength(160)
                                    ->placeholder('SEO Description (opsional)'),

                                FileUpload::make('og_image')
                                    ->label('OG Image')
                                    ->image()
                                    ->directory('blog/og')
                                    ->helperText('Image untuk social media sharing (1200x630px)'),
                            ]),
                    ])
                    ->columnSpanFull(),
            ]);
    }
}
