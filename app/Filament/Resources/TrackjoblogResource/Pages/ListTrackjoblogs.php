<?php

namespace App\Filament\Resources\TrackjoblogResource\Pages;

use App\Filament\Resources\TrackjoblogResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListTrackjoblogs extends ListRecords
{
    protected static string $resource = TrackjoblogResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
