<?php

namespace App\Filament\Resources\CorpResource\Pages;

use App\Filament\Resources\CorpResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListCorps extends ListRecords
{
    protected static string $resource = CorpResource::class;

    protected function getHeaderActions(): array
    {
        return [
            
        ];
    }
}
