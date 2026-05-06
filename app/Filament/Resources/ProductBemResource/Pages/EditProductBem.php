<?php

namespace App\Filament\Resources\ProductBemResource\Pages;

use App\Filament\Resources\ProductBemResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\EditRecord;

class EditProductBem extends EditRecord
{
    protected static string $resource = ProductBemResource::class;

    protected function getActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
