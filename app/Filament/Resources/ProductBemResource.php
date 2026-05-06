<?php

namespace App\Filament\Resources;

use App\Filament\Resources\ProductBemResource\Pages;
use App\Filament\Resources\ProductBemResource\RelationManagers;
use App\Models\ProductBem;
use App\Models\ProductCategory;
use Closure;
use Filament\Forms;
use Filament\Forms\Components\Card;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\SpatieMediaLibraryFileUpload;
use Filament\Resources\Form;
use Filament\Resources\Resource;
use Filament\Resources\Table;
use Filament\Tables;
use Filament\Tables\Columns\SpatieMediaLibraryImageColumn;
use Filament\Tables\Filters\SelectFilter;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Illuminate\Support\Str;

class ProductBemResource extends Resource
{
    protected static ?string $model = ProductBem::class;

    protected static ?string $navigationIcon = 'heroicon-o-cube';
    protected static ?string $navigationLabel = 'Product BEM';

    protected static ?int $navigationSort = 5;
    protected static ?string $navigationGroup = 'BEM FT';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Card::make()->schema([
                    Select::make('category_id')
                        ->label('Kategori')
                        ->options(ProductCategory::all()->pluck('name', 'id'))
                        ->required(),
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
                    Forms\Components\TextInput::make('description')
                        ->required()
                        ->maxLength(255),
                    SpatieMediaLibraryFileUpload::make('image')
                        ->collection('productbems')
                        ->responsiveImages(),
                    Forms\Components\TextInput::make('price')
                        ->required(),
                    Forms\Components\TextInput::make('url')
                        ->maxLength(255),
                ])
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                SpatieMediaLibraryImageColumn::make('image')
                ->collection('productbems'),
                Tables\Columns\TextColumn::make('category.name'),
                Tables\Columns\TextColumn::make('name')->searchable(),
                Tables\Columns\TextColumn::make('slug'),
                Tables\Columns\TextColumn::make('description'),
                Tables\Columns\TextColumn::make('price'),
                Tables\Columns\TextColumn::make('url'),
                Tables\Columns\TextColumn::make('created_at')
                    ->dateTime(),
            ])
            ->filters([
                SelectFilter::make('category_id')
                    ->label('Category')
                    ->relationship('category', 'name'),
            ])
            ->actions([
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
            'index' => Pages\ListProductBems::route('/'),
            'create' => Pages\CreateProductBem::route('/create'),
            'edit' => Pages\EditProductBem::route('/{record}/edit'),
        ];
    }
}
