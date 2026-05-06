<?php

namespace App\Filament\Resources\PressReleaseResource\Pages;

use App\Filament\Resources\PressReleaseResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\ManageRecords;

class ManagePressReleases extends ManageRecords
{
    protected static string $resource = PressReleaseResource::class;
    protected static ?string $title = 'List Press Release';

    protected function getActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
