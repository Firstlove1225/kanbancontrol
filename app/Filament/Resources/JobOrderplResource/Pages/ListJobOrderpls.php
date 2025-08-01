<?php

namespace App\Filament\Resources\JobOrderplResource\Pages;

use App\Filament\Resources\JobOrderplResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListJobOrderpls extends ListRecords
{
    protected static string $resource = JobOrderplResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
