<?php

namespace App\Filament\Resources\ProductResource\Pages;

use App\Filament\Resources\ProductResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\ListRecords;

class ListProducts extends ListRecords
{
    protected static string $resource = ProductResource::class;
    protected static ?string $title = 'Daftar Produk Himpunan';

    protected function getActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
