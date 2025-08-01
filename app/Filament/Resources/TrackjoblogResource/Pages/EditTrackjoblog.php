<?php

namespace App\Filament\Resources\TrackjoblogResource\Pages;

use App\Filament\Resources\TrackjoblogResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditTrackjoblog extends EditRecord
{
    protected static string $resource = TrackjoblogResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
