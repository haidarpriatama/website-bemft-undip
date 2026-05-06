<?php

namespace App\Filament\Resources\JurusanResource\Pages;

use App\Filament\Resources\JurusanResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\ManageRecords;

class ManageJurusans extends ManageRecords
{
    protected static string $resource = JurusanResource::class;
    protected static ?string $title = 'List Jurusan';

    protected function getActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }

    protected function isTablePaginationEnabled(): bool
    {
        return false;
    }
}
