<?php

namespace App\Filament\Resources\DivisiResource\Pages;

use App\Filament\Resources\DivisiResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\ManageRecords;

class ManageDivisis extends ManageRecords
{
    protected static string $resource = DivisiResource::class;
    protected static ?string $title = 'List Divisi';

    protected function getActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
