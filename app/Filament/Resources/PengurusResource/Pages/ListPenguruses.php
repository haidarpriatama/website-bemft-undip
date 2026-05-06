<?php

namespace App\Filament\Resources\PengurusResource\Pages;

use App\Filament\Resources\PengurusResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\ListRecords;
use Konnco\FilamentImport\Actions\ImportAction;
use Konnco\FilamentImport\Actions\ImportField;
use AlperenErsoy\FilamentExport\Actions\FilamentExportHeaderAction;

class ListPenguruses extends ListRecords
{
    protected static string $resource = PengurusResource::class;
    public static ?string $title = 'List Pengurus';

    protected function getActions(): array
    {
        return [
            Actions\CreateAction::make(),
            ImportAction::make()
                ->handleBlankRows(true)
                ->fields([
                    ImportField::make('bidang_id')
                    ->label('Bidang'),
                    ImportField::make('divisi_id')
                    ->label('Divisi'),
                    ImportField::make('proker_id')
                    ->label('Program Kerja'),
                    ImportField::make('jurusan_id')
                    ->label('Jurusan')
                    ->required(),
                    ImportField::make('tahun_kepengurusan')
                    ->label('Tahun Kepengurusan')
                    ->required(),
                    ImportField::make('nama')
                    ->label('Nama')
                    ->required(),
                    ImportField::make('nim')
                    ->label('NIM')
                    ->required(),
                    ImportField::make('angkatan')
                    ->label('Angkatan')
                    ->required(),
                    ImportField::make('instagram')
                    ->label('Instagram'),
                ])
        ];
    }

    protected function getTableHeaderActions(): array
    {
        return [
            FilamentExportHeaderAction::make('Export')->button(),
        ];
    }

}
