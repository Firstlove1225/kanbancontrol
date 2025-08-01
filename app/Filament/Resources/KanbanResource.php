<?php

namespace App\Filament\Resources;

use App\Filament\Resources\KanbanResource\Pages;
use App\Filament\Resources\KanbanResource\RelationManagers;
use App\Models\Kanban;
use Filament\Forms;
use Filament\Forms\Components\Grid;
use Filament\Forms\Components\Section;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class KanbanResource extends Resource
{
    protected static ?string $model = Kanban::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';
    protected static ?string $navigationLabel = 'KANBAN';

    protected static ?string $label = 'KANBAN';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Section::make('Kanban Details')
                    ->schema([
                        Grid::make(2)
                            ->schema([
                                Forms\Components\TextInput::make('CPART_NO')
                                    ->required()
                                    ->maxLength(255)
                                    ->disabled(fn(?string $operation) => $operation === 'edit'),
                                Forms\Components\TextInput::make('CFORM')
                                    ->maxLength(255),
                            ]),
                        Grid::make(2)
                            ->schema([
                                Forms\Components\Toggle::make('CCOATING'),
                                Forms\Components\TextInput::make('CTO')
                                    ->maxLength(255),
                            ]),
                        Grid::make(2)
                            ->schema([
                                Forms\Components\TextInput::make('CREV')
                                    ->maxLength(255),
                                Forms\Components\TextInput::make('CISSUED')
                                    ->maxLength(255),
                            ]),
                        Grid::make(2)
                            ->schema([
                                Forms\Components\TextInput::make('CPACK')
                                    ->maxLength(255),
                                Forms\Components\TextInput::make('CPICTURE')
                                    ->maxLength(255),
                            ]),
                        Grid::make(2)
                            ->schema([
                                Forms\Components\TextInput::make('NQTY')
                                    ->numeric(),
                                Forms\Components\TextInput::make('CMODEL')
                                    ->maxLength(255),
                            ]),
                        Grid::make(2)
                            ->schema([
                                Forms\Components\TextInput::make('CTYPE')
                                    ->maxLength(255),
                                Forms\Components\TextInput::make('NOPTION')
                                    ->numeric(),
                            ]),
                    ])
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('CPART_NO')
                    ->searchable()
                    ->sortable(),
                Tables\Columns\TextColumn::make('CFORM')
                    ->searchable()
                    ->sortable(),
                Tables\Columns\IconColumn::make('CCOATING')
                    ->boolean(),
                Tables\Columns\TextColumn::make('CTO')
                    ->searchable()
                    ->sortable(),
                Tables\Columns\TextColumn::make('CREV')
                    ->searchable()
                    ->sortable(),
                Tables\Columns\TextColumn::make('CISSUED')
                    ->searchable()
                    ->sortable(),
                Tables\Columns\TextColumn::make('CPACK')
                    ->searchable()
                    ->sortable(),
                Tables\Columns\TextColumn::make('CPICTURE')
                    ->searchable()
                    ->sortable(),
                Tables\Columns\TextColumn::make('NQTY')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('CMODEL')
                    ->searchable()
                    ->sortable(),
                Tables\Columns\TextColumn::make('CTYPE')
                    ->searchable()
                    ->sortable(),
                Tables\Columns\TextColumn::make('NOPTION')
                    ->numeric()
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
            'index' => Pages\ListKanbans::route('/'),
            'create' => Pages\CreateKanban::route('/create'),
            'edit' => Pages\EditKanban::route('/{record}/edit'),
        ];
    }
}
