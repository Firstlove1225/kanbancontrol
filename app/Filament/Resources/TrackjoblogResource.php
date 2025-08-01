<?php

namespace App\Filament\Resources;

use App\Filament\Resources\TrackjoblogResource\Pages;
use App\Filament\Resources\TrackjoblogResource\RelationManagers;
use App\Models\Trackjoblog;
use Filament\Forms;
use Filament\Forms\Components\Grid;
use Filament\Forms\Components\Section;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class TrackjoblogResource extends Resource
{
    protected static ?string $model = Trackjoblog::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';
    protected static ?string $navigationLabel = 'JOB ORDER STEP';
    protected static ?string $label =  'JOB ORDER STEP';


    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Section::make('Trackjoblog Details')
                    ->schema([
                        Grid::make(2)
                            ->schema([
                                Forms\Components\TextInput::make('Row_NO')
                                    ->numeric()
                                    ->required()
                                    ->disabled(fn(?string $operation) => $operation === 'edit'),
                                Forms\Components\TextInput::make('KANBAN')
                                    ->maxLength(255),
                            ]),
                        Grid::make(2)
                            ->schema([
                                Forms\Components\TextInput::make('CPART_NO')
                                    ->maxLength(255),
                                Forms\Components\TextInput::make('STEP')
                                    ->maxLength(255),
                            ]),
                        Grid::make(2)
                            ->schema([
                                Forms\Components\TextInput::make('WORK_NAME')
                                    ->maxLength(255),
                                Forms\Components\TextInput::make('CT')
                                    ->numeric(),
                            ]),
                        Grid::make(2)
                            ->schema([
                                Forms\Components\TextInput::make('AC_CT')
                                    ->numeric(),
                                Forms\Components\DateTimePicker::make('STARTDATE')
                                    ->format('Y-m-d H:i:s')
                                    ->nullable(),
                            ]),
                        Grid::make(2)
                            ->schema([
                                Forms\Components\DateTimePicker::make('ENDDATE')
                                    ->format('Y-m-d H:i:s')
                                    ->nullable(),
                                Forms\Components\TextInput::make('STATUS')
                                    ->maxLength(255),
                            ]),
                        Grid::make(2)
                            ->schema([
                                Forms\Components\DateTimePicker::make('ACT_STARTDATE')
                                    ->format('Y-m-d H:i:s')
                                    ->nullable(),
                                Forms\Components\TextInput::make('JOB_NO')
                                    ->maxLength(255),
                            ]),
                        Grid::make(2)
                            ->schema([
                                Forms\Components\TextInput::make('TYPE_USER')
                                    ->maxLength(255),
                                Forms\Components\TextInput::make('FACTORY')
                                    ->maxLength(255),
                            ]),
                        Grid::make(2)
                            ->schema([
                                Forms\Components\TextInput::make('SUPCODE')
                                    ->maxLength(255),
                                Forms\Components\TextInput::make('FNQTY')
                                    ->numeric(),
                            ]),
                        Grid::make(2)
                            ->schema([
                                Forms\Components\TextInput::make('FNBACKQTY')
                                    ->numeric(),
                                Forms\Components\TextInput::make('PART_COATING')
                                    ->maxLength(255),
                            ]),
                        Grid::make(2)
                            ->schema([
                                Forms\Components\TextInput::make('COMPUTERNAME')
                                    ->maxLength(255),
                                Forms\Components\TextInput::make('FNSAVEQTY')
                                    ->numeric(),
                            ]),
                    ])
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('Row_NO')
                    ->numeric()
                    ->searchable()
                    ->sortable(),
                Tables\Columns\TextColumn::make('KANBAN')
                    ->searchable()
                    ->sortable(),
                Tables\Columns\TextColumn::make('CPART_NO')
                    ->searchable()
                    ->sortable(),
                Tables\Columns\TextColumn::make('STEP')
                    ->searchable()
                    ->sortable(),
                Tables\Columns\TextColumn::make('WORK_NAME')
                    ->searchable()
                    ->sortable(),
                Tables\Columns\TextColumn::make('CT')
                    ->numeric()
                    ->searchable()
                    ->sortable(),
                Tables\Columns\TextColumn::make('AC_CT')
                    ->numeric()
                    ->searchable()
                    ->sortable(),
                Tables\Columns\TextColumn::make('STARTDATE')
                    ->dateTime()
                    ->searchable()
                    ->sortable(),
                Tables\Columns\TextColumn::make('ENDDATE')
                    ->dateTime()
                    ->searchable()
                    ->sortable(),
                Tables\Columns\TextColumn::make('STATUS')
                    ->searchable()
                    ->sortable(),
                Tables\Columns\TextColumn::make('ACT_STARTDATE')
                    ->dateTime()
                    ->searchable()
                    ->sortable(),

                Tables\Columns\TextColumn::make('JOB_NO')
                    ->searchable()
                    ->sortable(),
                Tables\Columns\TextColumn::make('TYPE_USER')
                    ->searchable()
                    ->sortable(),
                Tables\Columns\TextColumn::make('FACTORY')
                    ->searchable()
                    ->sortable(),
                Tables\Columns\TextColumn::make('SUPCODE')
                    ->searchable()
                    ->sortable(),
                Tables\Columns\TextColumn::make('FNQTY')
                    ->numeric()
                    ->searchable()
                    ->sortable(),
                Tables\Columns\TextColumn::make('FNBACKQTY')
                    ->numeric()
                    ->searchable()
                    ->sortable(),
                Tables\Columns\TextColumn::make('PART_COATING')
                    ->searchable()
                    ->sortable(),
                Tables\Columns\TextColumn::make('COMPUTERNAME')
                    ->searchable()
                    ->sortable(),
                Tables\Columns\TextColumn::make('FNSAVEQTY')
                    ->numeric()
                    ->searchable()
                    ->sortable(),
            ])
            ->filters([
                //
            ])
            ->defaultSort('STARTDATE', 'desc')
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
            'index' => Pages\ListTrackjoblogs::route('/'),
            'create' => Pages\CreateTrackjoblog::route('/create'),
            'edit' => Pages\EditTrackjoblog::route('/{record}/edit'),
        ];
    }
}
