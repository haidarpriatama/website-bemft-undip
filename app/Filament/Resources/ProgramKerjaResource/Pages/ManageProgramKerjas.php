<?php

namespace App\Filament\Resources\ProgramKerjaResource\Pages;

use App\Filament\Resources\ProgramKerjaResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\ManageRecords;

class ManageProgramKerjas extends ManageRecords
{
    protected static string $resource = ProgramKerjaResource::class;
    protected static ?string $title = 'List Program Kerja';

    protected function getActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
