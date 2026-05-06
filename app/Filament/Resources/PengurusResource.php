<?php

namespace App\Filament\Resources;

use App\Filament\Resources\PengurusResource\Pages;
use App\Filament\Resources\PengurusResource\RelationManagers;
use App\Models\Bidang;
use App\Models\Divisi;
use App\Models\Jurusan;
use App\Models\Pengurus;
use App\Models\ProgramKerja;
use Carbon\Carbon;
use Filament\Forms;
use Filament\Forms\Components\Card;
use Filament\Forms\Components\Grid;
use Filament\Resources\Form;
use Filament\Resources\Resource;
use Filament\Resources\Table;
use Filament\Tables;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\SpatieMediaLibraryFileUpload;
use Filament\Tables\Filters\SelectFilter;

class PengurusResource extends Resource
{
    protected static ?string $model = Pengurus::class;

    protected static ?string $navigationIcon = 'heroicon-o-users';
    protected static ?string $navigationLabel = 'Pengurus';

    public static ?string $label = 'Pengurus';

    public static ?string $slug = 'pengurus';

    public static function form(Form $form): Form
    {
        $years = [];
        for ($year = 2000; $year <= 2050; $year++) {
            $years[$year] = $year;
        }

        return $form
            ->schema([
                Grid::make()->schema([
                    Card::make()->schema([
                        SpatieMediaLibraryFileUpload::make('foto')
                            ->imagePreviewHeight('50')
                            ->loadingIndicatorPosition('left')
                            ->panelAspectRatio('3:4')
                            ->panelLayout('integrated')
                            ->removeUploadedFileButtonPosition('right')
                            ->uploadButtonPosition('left')
                            ->uploadProgressIndicatorPosition('left')
                            ->image()
                            ->collection('foto_kepengurusans')
                            ->responsiveImages(),
                    ])
                ])->columnSpan(2),
                Grid::make()->schema([
                    Card::make()->schema([
                        Forms\Components\TextInput::make('nama')
                            ->required()
                            ->maxLength(255),
                        Forms\Components\TextInput::make('nim')
                            ->label('NIM')
                            ->required()
                            ->maxLength(255),
                        Select::make('jurusan_id')
                            ->label('Jurusan')
                            ->options(Jurusan::all()->pluck('name', 'id'))
                            ->searchable()
                            ->required(),
                        Forms\Components\TextInput::make('angkatan')
                            ->required()
                            ->maxLength(255),
                        Forms\Components\TextInput::make('instagram')
                            ->maxLength(255),
                    ])
                ])->columnSpan(4),
                Grid::make()->schema([
                    Card::make()->schema([
                        Select::make('tahun_kepengurusan')
                            ->label('Tahun Kepengurusan')
                            ->options($years)
                            ->default(Carbon::now()->year)
                            ->required(),
                        Select::make('bidang_id')
                            ->label('Bidang')
                            ->options(Bidang::all()->pluck('name', 'id'))
                            ->searchable()
                            ->reactive()
                            ->afterStateUpdated(function($set) {
                                $set('divisi_id', null);
                                $set('proker_id', null);
                            }),
                        Select::make('divisi_id')
                            ->label('Divisi')
                            ->options(function(callable $get) {
                                $bidang = Bidang::find($get('bidang_id'));

                                if(!$bidang) {
                                    return Divisi::all()->pluck('name','id');
                                }

                                return $bidang->divisi->pluck('name', 'id');
                            })
                            ->searchable()
                            ->reactive()
                            ->afterStateUpdated(fn(callable $set) => $set('proker_id', null)),
                        Select::make('proker_id')
                            ->label('Program Kerja (Optional)')
                            ->options(function(callable $get) {
                                $divisi = Divisi::find($get('divisi_id'));

                                if(!$divisi) {
                                    return ProgramKerja::all()->pluck('name','id');
                                }

                                return $divisi->programkerja->pluck('name', 'id');
                            })
                            ->searchable(),
                    ])
                ])->columnSpan(2),

            ])->columns(8);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('bidang.name')->wrap()->searchable(),
                Tables\Columns\TextColumn::make('nama')->wrap()->searchable(),
                Tables\Columns\TextColumn::make('nim')->searchable(),
                Tables\Columns\TextColumn::make('angkatan'),
                Tables\Columns\TextColumn::make('jurusan.name')->wrap()->searchable(),
                Tables\Columns\TextColumn::make('tahun_kepengurusan')->label('Tahun Kepengurusan')->wrap(),
                Tables\Columns\TextColumn::make('created_at')
                    ->date(),
            ])
            ->filters([
                SelectFilter::make('bidang_id')
                    ->label('Bidang')
                    ->relationship('bidang', 'name'),
                SelectFilter::make('jurusan_id')
                    ->label('Jurusan')
                    ->relationship('jurusan', 'name'),
            ])
            ->headerActions([

            ])
            ->actions([
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make(),
                // Tables\Actions\ViewAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\DeleteBulkAction::make(),
            ]);
    }

    public static function getRelations(): array
    {
        return [
            RelationManagers\JabatanRelationManager::class,
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListPenguruses::route('/'),
            'create' => Pages\CreatePengurus::route('/create'),
            'edit' => Pages\EditPengurus::route('/{record}/edit'),
        ];
    }
}
