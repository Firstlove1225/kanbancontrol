<?php

namespace App\Filament\Resources\UmResource\Pages;

use App\Filament\Resources\UmResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditUm extends EditRecord
{
    protected static string $resource = UmResource::class;

    protected function getHeaderActions(): array
    {
        return [
            
        ];
    }
}
