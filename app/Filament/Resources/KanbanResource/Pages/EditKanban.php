<?php

namespace App\Filament\Resources\KanbanResource\Pages;

use App\Filament\Resources\KanbanResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditKanban extends EditRecord
{
    protected static string $resource = KanbanResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
