<?php

namespace App\Filament\Resources\PrestasiResource\Pages;

use App\Filament\Resources\PrestasiResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\ManageRecords;

class ManagePrestasis extends ManageRecords
{
    protected static string $resource = PrestasiResource::class;
    protected static ?string $title = 'List Tebar Prestasi';

    protected function getActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
