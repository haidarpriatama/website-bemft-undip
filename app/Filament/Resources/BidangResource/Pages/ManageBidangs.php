<?php

namespace App\Filament\Resources\BidangResource\Pages;

use App\Filament\Resources\BidangResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\ManageRecords;

class ManageBidangs extends ManageRecords
{
    protected static string $resource = BidangResource::class;
    protected static ?string $title = 'List Bidang';

    protected function getActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }

    protected function isTablePaginationEnabled(): bool
    {
        return false;
    }
}
