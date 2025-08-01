<?php

namespace App\Filament\Resources\TblruncodeResource\Pages;

use App\Filament\Resources\TblruncodeResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditTblruncode extends EditRecord
{
    protected static string $resource = TblruncodeResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
