<?php

namespace App\Filament\Resources\TblruncodeResource\Pages;

use App\Filament\Resources\TblruncodeResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListTblruncodes extends ListRecords
{
    protected static string $resource = TblruncodeResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
