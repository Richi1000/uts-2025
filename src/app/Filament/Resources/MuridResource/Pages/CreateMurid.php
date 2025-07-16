<?php

namespace App\Filament\Resources\MuridResource\Pages;

use App\Filament\Resources\MuridResource;
use App\Models\User;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
class CreateMurid extends CreateRecord
{
    protected static string $resource = MuridResource::class;
}
