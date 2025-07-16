<?php

namespace App\Filament\Resources\BelajarResource\Pages;

use App\Filament\Resources\BelajarResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListBelajars extends ListRecords
{
    protected static string $resource = BelajarResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
