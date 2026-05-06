<?php

namespace App\Filament\Resources;

use App\Filament\Resources\UpkResource\Pages;
use App\Filament\Resources\UpkResource\RelationManagers;
use App\Models\Upk;
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

class UpkResource extends Resource
{
    protected static ?string $model = Upk::class;

    protected static ?string $navigationIcon = 'heroicon-o-library';
    protected static ?string $navigationLabel = 'UPK';

    protected static ?int $navigationSort = 2;
    protected static ?string $navigationGroup = 'Additional';

    protected static function getNavigationBadge(): ?string
    {
        return (string) Upk::count();
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
                    ->directory('logoupks')
                    ->collection('logoupks')
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
                ->collection('logoupks'),
                Tables\Columns\TextColumn::make('name'),
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
            'index' => Pages\ManageUpks::route('/'),
        ];
    }
}
