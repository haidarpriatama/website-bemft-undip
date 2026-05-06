<?php

namespace App\Filament\Resources;

use App\Filament\Resources\PostResource\Pages;
use App\Filament\Resources\PostResource\RelationManagers;
use App\Models\Post;
use App\Models\PostCategory;
use Closure;
use Filament\Forms;
use Filament\Forms\Components\Card;
use Filament\Forms\Components\Grid;
use Filament\Forms\Components\Hidden;
use Filament\Forms\Components\Section;
use Filament\Forms\Components\SpatieTagsInput;
use Filament\Resources\Form;
use Filament\Resources\Resource;
use Filament\Resources\Table;
use Filament\Tables;
use Filament\Tables\Columns\ImageColumn;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Illuminate\Support\Str;
use Mohamedsabil83\FilamentFormsTinyeditor\Components\TinyEditor;
use Filament\Forms\Components\SpatieMediaLibraryFileUpload;
use Filament\Tables\Columns\BadgeColumn;
use Filament\Tables\Columns\SpatieMediaLibraryImageColumn;
use Filament\Tables\Columns\ViewColumn;
use Filament\Tables\Filters\SelectFilter;
use RalphJSmit\Filament\SEO\SEO;

class PostResource extends Resource
{
    protected static ?string $model = Post::class;

    protected static ?string $navigationIcon = 'heroicon-o-collection';

    protected static ?string $navigationGroup = 'Content';

    protected static function getNavigationBadge(): ?string
    {
        return (string) Post::count();
    }

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Grid::make()->schema([
                    Card::make([
                        Forms\Components\TextInput::make('title')
                            ->required()
                            ->maxLength(2048)
                            ->reactive()
                            ->afterStateUpdated(function(Closure $set, $state) {
                                $set('slug', Str::slug($state));
                                $set('seo.title', $state);
                            }),
                        TinyEditor::make('content')
                            ->required(),
                    ]),
                ])->columnSpan(4),
                Grid::make()->schema([
                    Card::make([
                        SpatieMediaLibraryFileUpload::make('thumbnail')
                        ->collection('thumbnails')
                        ->responsiveImages(),
                    ]),
                    Section::make('SEO')
                        ->description('SEO Settings')
                        ->schema([
                            Hidden::make('user_id')
                                ->default(auth()->user()->id)
                                ->required(),
                            SEO::make(['title', 'description']),
                            Forms\Components\TextInput::make('slug')
                                ->required()
                                ->maxLength(2048),
                        ])
                        ->collapsible(),
                    Section::make('Tags and Categories')
                        ->description('Tags and Categories Option')
                        ->schema([
                            SpatieTagsInput::make('tags')
                                ->label('Tags'),
                            Forms\Components\Select::make('category_id')
                                ->relationship('category', 'name')
                                ->searchable()
                                ->preload()
                                ->required(),
                            Forms\Components\Select::make('bidang_id')
                                ->relationship('bidang', 'name')
                                ->searchable()
                                ->preload(),
                        ])
                        ->collapsible(),
                    Section::make('Visibility')
                        ->description('Visibility Option')
                        ->schema([
                            Forms\Components\Select::make('status')
                                ->required()
                                ->options([
                                    'published' => 'Published',
                                    'draft' => 'Draft'
                                ]),
                            Forms\Components\DateTimePicker::make('published_at')
                                ->default(now())
                                ->required(),
                        ]),
                ])->columnSpan(2),
            ])->columns(6);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('category.name'),
                SpatieMediaLibraryImageColumn::make('thumbnail')
                    ->collection('thumbnails'),
                Tables\Columns\TextColumn::make('title')
                    ->sortable(['title'])
                    ->searchable(['title'])
                    ->wrap(),
                BadgeColumn::make('status')
                    ->enum([
                        'draft' => 'Draft',
                        'published' => 'Published',
                    ])
                    ->colors([
                        'primary',
                        'secondary' => 'draft',
                        'success' => 'published',
                    ])
                    ->tooltip(fn (Post $record): string => $record->published_at->format('d F Y | H:i A')),
                // Tables\Columns\TextColumn::make('status'),
                Tables\Columns\TextColumn::make('created_at')
                    ->dateTime(),
            ])
            ->filters([
                SelectFilter::make('category_id')
                    ->label('Category')
                    ->relationship('category', 'name'),
            ])
            ->actions([
                Tables\Actions\ViewAction::make(),
                Tables\Actions\EditAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\DeleteBulkAction::make(),
            ]);
    }

    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListPosts::route('/'),
            'create' => Pages\CreatePost::route('/create'),
            'view' => Pages\ViewPost::route('/{record}'),
            'edit' => Pages\EditPost::route('/{record}/edit'),
        ];
    }
}
