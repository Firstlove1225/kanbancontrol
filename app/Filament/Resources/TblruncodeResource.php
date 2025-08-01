<?php

namespace App\Filament\Resources;

use App\Filament\Resources\TblruncodeResource\Pages;
use App\Filament\Resources\TblruncodeResource\RelationManagers;
use App\Models\Tblruncode;
use Filament\Forms;
use Filament\Forms\Components\Grid;
use Filament\Forms\Components\Section;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class TblruncodeResource extends Resource
{
    protected static ?string $model = Tblruncode::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';
    protected static ?string $navigationLabel = 'Run Code Book';
    protected static ?string $label = 'Run Code Book';



    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Section::make('Tblruncode Details')
                    ->schema([
                        Grid::make(2)
                            ->schema([
                                Forms\Components\TextInput::make('id')
                                    ->numeric()
                                    ->required()
                                    ->disabled(fn(?string $operation) => $operation === 'edit'),
                                Forms\Components\TextInput::make('FCCODE_YEAR')
                                    ->numeric()
                                    ->required(),
                            ]),
                        Grid::make(2)
                            ->schema([
                                Forms\Components\TextInput::make('FCCODE_Month')
                                    ->maxLength(255),
                                Forms\Components\TextInput::make('FCCODE_No')
                                    ->numeric(),
                            ]),
                        Grid::make(1)
                            ->schema([
                                Forms\Components\TextInput::make('BOOK')
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
                    ->numeric()
                    ->searchable()
                    ->sortable(),
                Tables\Columns\TextColumn::make('FCCODE_YEAR')
                    ->numeric()
                    ->searchable()
                    ->sortable(),
                Tables\Columns\TextColumn::make('FCCODE_Month')
                    ->searchable()
                    ->sortable(),
                Tables\Columns\TextColumn::make('FCCODE_No')
                    ->numeric()
                    ->searchable()
                    ->sortable(),
                Tables\Columns\TextColumn::make('BOOK')
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
            'index' => Pages\ListTblruncodes::route('/'),
            'create' => Pages\CreateTblruncode::route('/create'),
            'edit' => Pages\EditTblruncode::route('/{record}/edit'),
        ];
    }
}
