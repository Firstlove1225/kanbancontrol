<?php

namespace App\Filament\Resources\TblareeResource\Pages;

use App\Filament\Resources\TblareeResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListTblarees extends ListRecords
{
    protected static string $resource = TblareeResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
