<?php

namespace App\Filament\Resources\ProductResource\RelationManagers;

use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\RelationManagers\RelationManager;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class StocksRelationManager extends RelationManager
{
    protected static string $relationship = 'stocks';

    public function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('FCSKID')
                    ->required()
                    ->maxLength(255),
                Forms\Components\TextInput::make('FCCORP')
                    ->required()
                    ->maxLength(255),
                Forms\Components\Select::make('FCWHOUSE')
                    ->relationship('whouse', 'FCNAME')
                    ->required(),
                Forms\Components\TextInput::make('FCLOT')
                    ->required()
                    ->maxLength(255),
                Forms\Components\TextInput::make('FNQTY')
                    ->numeric()
                    ->required(),
            ]);
    }

    public function table(Table $table): Table
    {
        return $table
            ->recordTitleAttribute('FCSKID')
            ->columns([
                // Tables\Columns\TextColumn::make('FCSKID')
                //     ->searchable(),
                // Tables\Columns\TextColumn::make('FCCORP')
                //     ->searchable(),
                Tables\Columns\TextColumn::make('whouse.FCNAME')
                    ->label('Warehouse Name')
                    ->searchable(),
                Tables\Columns\TextColumn::make('FCLOT')
                    ->searchable(),
                Tables\Columns\TextColumn::make('FNQTY')
                    ->searchable(),
            ])
            ->filters([
                //
            ])
            ->headerActions([
                Tables\Actions\CreateAction::make(),
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ]);
    }
}
