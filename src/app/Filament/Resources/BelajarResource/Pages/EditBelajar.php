<?php

namespace App\Filament\Resources\BelajarResource\Pages;

use App\Filament\Resources\BelajarResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditBelajar extends EditRecord
{
    protected static string $resource = BelajarResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
