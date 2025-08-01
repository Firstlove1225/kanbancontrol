<?php

namespace App\Filament\Resources\TblareeResource\Pages;

use App\Filament\Resources\TblareeResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditTblaree extends EditRecord
{
    protected static string $resource = TblareeResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
