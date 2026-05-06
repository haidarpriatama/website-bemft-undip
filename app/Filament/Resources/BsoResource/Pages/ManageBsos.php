<?php

namespace App\Filament\Resources\BsoResource\Pages;

use App\Filament\Resources\BsoResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\ManageRecords;

class ManageBsos extends ManageRecords
{
    protected static string $resource = BsoResource::class;
    protected static ?string $title = 'List BSO';

    protected function getActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
