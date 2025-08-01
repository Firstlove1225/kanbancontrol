<?php

namespace App\Filament\Resources;

use App\Filament\Resources\TblareeResource\Pages;
use App\Filament\Resources\TblareeResource\RelationManagers;
use App\Models\Tblaree;
use Filament\Forms;
use Filament\Forms\Components\Grid;
use Filament\Forms\Components\Section;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class TblareeResource extends Resource
{
    protected static ?string $model = Tblaree::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';
    protected static ?string $navigationLabel = 'PART COATING';
    protected static ?string $label = 'PART CODTING';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Section::make('Tblaree Details')
                    ->schema([
                        Grid::make(2)
                            ->schema([
                                Forms\Components\TextInput::make('id')
                                    ->required()
                                    ->maxLength(255)
                                    ->disabled(),
                                Forms\Components\TextInput::make('CPART_NO')
                                    ->maxLength(255),
                            ]),
                        Grid::make(2)
                            ->schema([
                                Forms\Components\TextInput::make('STATUS')
                                    ->maxLength(255),
                                Forms\Components\TextInput::make('CPART_SUP')
                                    ->maxLength(255),
                            ]),
                    ])
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('id')
                    ->searchable()
                    ->sortable(),
                Tables\Columns\TextColumn::make('CPART_NO')
                    ->searchable()
                    ->sortable(),
                Tables\Columns\TextColumn::make('STATUS')
                    ->searchable()
                    ->sortable(),
                Tables\Columns\TextColumn::make('CPART_SUP')
                    ->searchable()
                    ->sortable(),
            ])
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
            'index' => Pages\ListTblarees::route('/'),
            'create' => Pages\CreateTblaree::route('/create'),
            'edit' => Pages\EditTblaree::route('/{record}/edit'),
        ];
    }
}
