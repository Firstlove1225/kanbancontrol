<?php

namespace App\Filament\Resources;

use App\Filament\Resources\CorpResource\Pages;
use App\Filament\Resources\CorpResource\RelationManagers;
use App\Models\Corp;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class CorpResource extends Resource
{
    protected static ?string $model = Corp::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('FCSKID')
                    ->required()
                    ->maxLength(255),
                Forms\Components\TextInput::make('FCCODE')
                    ->required()
                    ->maxLength(255),
                Forms\Components\TextInput::make('FCNAME')
                    ->required()
                    ->maxLength(255),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('FCSKID')
                    ->searchable(),
                Tables\Columns\TextColumn::make('FCCODE')
                    ->searchable(),
                Tables\Columns\TextColumn::make('FCNAME')
                    ->searchable(),
            ])
            ->filters([
                //
            ])
            ->actions([
                // Tables\Actions\EditAction::make(),

            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([]),
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
            'index' => Pages\ListCorps::route('/'),

            
        ];
    }
}
