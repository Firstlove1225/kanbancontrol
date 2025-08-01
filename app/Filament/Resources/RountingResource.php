<?php

namespace App\Filament\Resources;

use App\Filament\Resources\RountingResource\Pages;
use App\Filament\Resources\RountingResource\RelationManagers;
use App\Models\Rounting;
use Filament\Forms;
use Filament\Forms\Components\Grid;
use Filament\Forms\Components\Section;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class RountingResource extends Resource
{
    protected static ?string $model = Rounting::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';
    protected static ?string $navigationLabel = 'ROUTING';
    protected static ?string $label = 'ROUTING PART';


    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Section::make('Rounting Details')
                    ->schema([
                        Grid::make(2)
                            ->schema([
                                Forms\Components\TextInput::make('ROUTING_ID')
                                    ->required()
                                    ->maxLength(255)
                                    ->disabled(fn(?string $operation) => $operation === 'edit'),
                                Forms\Components\TextInput::make('STEP')
                                    ->numeric()
                                    ->required(),
                            ]),
                        Grid::make(2)
                            ->schema([
                                Forms\Components\TextInput::make('PART_NO')
                                    ->maxLength(255),
                                Forms\Components\TextInput::make('WORK_ID')
                                    ->numeric(),
                            ]),
                        Grid::make(2)
                            ->schema([
                                Forms\Components\TextInput::make('WORK_NAME')
                                    ->maxLength(255),
                                Forms\Components\TextInput::make('CT')
                                    ->numeric(),
                            ]),
                        Grid::make(1)
                            ->schema([
                                Forms\Components\TextInput::make('S_VISABLE')
                                    ->numeric()
                                    ->default(0),
                            ]),
                    ])
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('ROUTING_ID')
                    ->searchable()
                    ->sortable(),
                Tables\Columns\TextColumn::make('STEP')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('PART_NO')
                    ->searchable()
                    ->sortable(),
                Tables\Columns\TextColumn::make('WORK_ID')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('WORK_NAME')
                    ->searchable()
                    ->sortable(),
                Tables\Columns\TextColumn::make('CT')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('S_VISABLE')
                    ->numeric()
                    ->sortable(),
            ])
            ->defaultGroup('PART_NO')
            ->defaultSort('STEP')
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ]);
    }

    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListRountings::route('/'),
            'create' => Pages\CreateRounting::route('/create'),
            'edit' => Pages\EditRounting::route('/{record}/edit'),
        ];
    }
}
