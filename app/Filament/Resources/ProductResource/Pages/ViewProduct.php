<?php

namespace App\Filament\Resources\ProductResource\Pages;

use App\Filament\Resources\ProductResource;
use Filament\Actions;
use Filament\Resources\Pages\ViewRecord;
use Filament\Forms\Components;

class ViewProduct extends ViewRecord
{
    protected static string $resource = ProductResource::class;

    public function form(\Filament\Forms\Form $form): \Filament\Forms\Form
    {
        return $form
            ->schema([
                Components\TextInput::make('FCSKID')
                    ->disabled()
                    ->maxLength(255),
                Components\TextInput::make('FCCORP')
                    ->disabled()
                    ->maxLength(255),
                Components\TextInput::make('FCTYPE')
                    ->disabled()
                    ->maxLength(255),
                Components\TextInput::make('FCCODE')
                    ->disabled()
                    ->maxLength(255),
                Components\TextInput::make('FCNAME')
                    ->disabled()
                    ->maxLength(255),
                Components\TextInput::make('FCSNAME')
                    ->disabled()
                    ->maxLength(255),
                Components\TextInput::make('FNSTDCOST')
                    ->numeric()
                    ->disabled(),
                Components\Placeholder::make('um_FCNAME')
                    ->label('หน่วยนับ')
                    ->content(fn ($record) => $record->um->FCNAME ?? 'N/A'),
                
                Components\TextInput::make('FNPRICE')
                    ->numeric()
                    ->disabled(),
            ]);
    }

    public function getRecord(): \Illuminate\Database\Eloquent\Model
    {
        return parent::getRecord()->load('um');
    }

    protected function getHeaderActions(): array
    {
        return [
            // Actions\EditAction::make(), // We don't want to allow editing from the view page
        ];
    }

    protected function getFooterActions(): array
    {
        return [
            //
        ];
    }
}