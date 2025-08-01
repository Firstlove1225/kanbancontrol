<?php

namespace App\Filament\Resources\KanbanResource\Pages;

use App\Filament\Resources\KanbanResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListKanbans extends ListRecords
{
    protected static string $resource = KanbanResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
