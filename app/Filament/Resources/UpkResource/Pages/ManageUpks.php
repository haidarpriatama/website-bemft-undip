<?php

namespace App\Filament\Resources\UpkResource\Pages;

use App\Filament\Resources\UpkResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\ManageRecords;

class ManageUpks extends ManageRecords
{
    protected static string $resource = UpkResource::class;
    protected static ?string $title = 'Daftar UPK';

    protected function getActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
