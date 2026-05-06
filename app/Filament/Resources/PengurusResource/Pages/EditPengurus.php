<?php

namespace App\Filament\Resources\PengurusResource\Pages;

use App\Filament\Resources\PengurusResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\EditRecord;

class EditPengurus extends EditRecord
{
    protected static string $resource = PengurusResource::class;

    protected function getActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
