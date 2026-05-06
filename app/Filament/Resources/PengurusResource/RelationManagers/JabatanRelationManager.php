<?php

namespace App\Filament\Resources\PengurusResource\RelationManagers;

use Carbon\Carbon;
use Filament\Forms;
use Filament\Forms\Components\Select;
use Filament\Resources\Form;
use Filament\Resources\RelationManagers\RelationManager;
use Filament\Resources\Table;
use Filament\Tables;
use Filament\Tables\Actions\AttachAction;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class JabatanRelationManager extends RelationManager
{
    protected static string $relationship = 'jabatan';

    protected static ?string $recordTitleAttribute = 'name';

    public static function form(Form $form): Form
    {

        $years = [];
        for ($year = 2000; $year <= 2050; $year++) {
            $years[$year] = $year;
        }

        return $form
            ->schema([
                Forms\Components\TextInput::make('name')
                    ->required()
                    ->maxLength(255),
                Forms\Components\TextInput::make('rank')
                    ->numeric()
                    ->required()
                    ->maxLength(255),
                Select::make('tahun_kepengurusan')
                    ->label('Tahun Kepengurusan')
                    ->options($years)
                    ->default(Carbon::now()->year)
                    ->required(),
            ]);
    }

    public static function table(Table $table): Table
    {
        $years = [];
        for ($year = 2000; $year <= 2050; $year++) {
            $years[$year] = $year;
        }

        return $table
            ->columns([
                Tables\Columns\TextColumn::make('rank'),
                Tables\Columns\TextColumn::make('name'),
                Tables\Columns\TextColumn::make('tahun_kepengurusan')->label('Tahun Kepengurusan'),
            ])
            ->filters([
                //
            ])
            ->headerActions([
                Tables\Actions\CreateAction::make(),
                Tables\Actions\AttachAction::make()
                    ->preloadRecordSelect()
                    ->form(fn (AttachAction $action): array => [
                        $action->getRecordSelect(),
                        Forms\Components\TextInput::make('rank')
                            ->numeric()
                            ->required()
                            ->maxLength(255),
                        Select::make('tahun_kepengurusan')
                            ->label('Tahun Kepengurusan')
                            ->options($years)
                            ->default(Carbon::now()->year)
                            ->required(),
                    ]),
            ])
            ->actions([
                Tables\Actions\ViewAction::make(),
                Tables\Actions\EditAction::make(),
                Tables\Actions\DetachAction::make(),
                Tables\Actions\DeleteAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\DetachBulkAction::make(),
                Tables\Actions\DeleteBulkAction::make(),
            ]);
    }
}
