<?php

namespace App\Filament\Resources\PengurusResource\Pages;

use App\Filament\Resources\PengurusResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\CreateRecord;

class CreatePengurus extends CreateRecord
{
    protected static string $resource = PengurusResource::class;
    protected static ?string $title = 'Add Pengurus';
}
