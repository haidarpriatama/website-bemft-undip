<?php

namespace App\Filament\Resources;

use App\Filament\Resources\BsoResource\Pages;
use App\Filament\Resources\BsoResource\RelationManagers;
use App\Models\Bso;
use Filament\Forms;
use Filament\Resources\Form;
use Filament\Resources\Resource;
use Filament\Resources\Table;
use Filament\Tables;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Closure;
use Filament\Forms\Components\TextInput;
use Illuminate\Support\Str;

use Filament\Forms\Components\SpatieMediaLibraryFileUpload;

use Filament\Tables\Columns\SpatieMediaLibraryImageColumn;

class BsoResource extends Resource
{
    protected static ?string $model = Bso::class;

    protected static ?string $navigationIcon = 'heroicon-o-library';
    protected static ?string $navigationLabel = 'BSO';

    protected static ?int $navigationSort = 1;
    protected static ?string $navigationGroup = 'Additional';

    protected static function getNavigationBadge(): ?string
    {
        return (string) Bso::count();
    }

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('name')
                    ->reactive()
                    ->afterStateUpdated(function (Closure $set, $state) {
                        $set('slug', Str::slug($state));
                    })
                    ->required()
                    ->maxLength(255),
                Forms\Components\TextInput::make('slug')
                    ->required()
                    ->maxLength(255),
                SpatieMediaLibraryFileUpload::make('logo')
                    ->directory('logobsos')
                    ->collection('logobsos')
                    ->responsiveImages(),
                Forms\Components\TextInput::make('url')
                    ->maxLength(255),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                SpatieMediaLibraryImageColumn::make('logo')
                    ->collection('logobsos'),
                Tables\Columns\TextColumn::make('name')->searchable(),
                Tables\Columns\TextColumn::make('slug'),
                Tables\Columns\TextColumn::make('url'),
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\DeleteBulkAction::make(),
            ]);
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ManageBsos::route('/'),
        ];
    }
}
