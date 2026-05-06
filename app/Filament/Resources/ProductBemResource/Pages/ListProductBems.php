<?php

namespace App\Filament\Resources\ProductBemResource\Pages;

use App\Filament\Resources\ProductBemResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\ListRecords;

class ListProductBems extends ListRecords
{
    protected static string $resource = ProductBemResource::class;
    protected static ?string $title = 'List Product BEM FT';

    protected function getActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
