<?php

namespace App\Filament\Resources\RountingResource\Pages;

use App\Filament\Resources\RountingResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditRounting extends EditRecord
{
    protected static string $resource = RountingResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
