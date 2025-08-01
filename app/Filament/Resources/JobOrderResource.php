<?php

namespace App\Filament\Resources;

use App\Filament\Resources\JobOrderResource\Pages;
use App\Filament\Resources\JobOrderResource\RelationManagers;
use App\Models\JobOrder;
use Filament\Forms;
use Filament\Forms\Components\Grid;
use Filament\Forms\Components\Section;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class JobOrderResource extends Resource
{
    protected static ?string $model = JobOrder::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';
    protected static ?string $navigationLabel = 'JOB ORDER PD';
    protected static ?string $label =  'JOB ORDER PD';


    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Section::make('JobOrder Details')
                    ->schema([
                        Grid::make(2)
                            ->schema([
                                Forms\Components\TextInput::make('ID')
                                    ->numeric()
                                    ->required()
                                    ->disabled(fn(?string $operation) => $operation === 'edit'),
                                Forms\Components\TextInput::make('PART_NO')
                                    ->maxLength(255),
                            ]),
                        Grid::make(2)
                            ->schema([
                                Forms\Components\TextInput::make('PLANT')
                                    ->maxLength(255),
                                Forms\Components\TextInput::make('NQTY')
                                    ->maxLength(255),
                            ]),
                        Grid::make(2)
                            ->schema([
                                Forms\Components\DateTimePicker::make('OPEN_DATE'),
                                Forms\Components\DateTimePicker::make('MTM_DATE'),
                            ]),
                        Grid::make(2)
                            ->schema([
                                Forms\Components\TextInput::make('USER_ID')
                                    ->numeric(),
                                Forms\Components\Select::make('STATUS')
                                    ->options([
                                        0 => 'กำลังดำเนินการ',
                                        1 => 'เรียบร้อย',
                                    ])
                                    ->default(0),
                            ]),
                        Grid::make(2)
                            ->schema([
                                Forms\Components\DateTimePicker::make('RMTM_DATE'),
                                Forms\Components\TextInput::make('JOB_NO')
                                    ->maxLength(255),
                            ]),
                    ])
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('ID')
                    ->numeric()
                    ->searchable()
                    ->sortable(),
                Tables\Columns\TextColumn::make('PART_NO')
                    ->searchable()
                    ->sortable(),
                Tables\Columns\TextColumn::make('PLANT')
                    ->searchable()
                    ->sortable(),
                Tables\Columns\TextColumn::make('NQTY')
                    ->searchable()
                    ->sortable(),
                Tables\Columns\TextColumn::make('OPEN_DATE')
                    ->dateTime('d-m-Y H:i:s')
                    ->sortable(),
                Tables\Columns\TextColumn::make('MTM_DATE')
                    ->dateTime()
                    ->sortable(),
                Tables\Columns\TextColumn::make('USER_ID')
                    ->numeric()
                    ->searchable()
                    ->sortable(),
                Tables\Columns\TextColumn::make('STATUS')
                    ->formatStateUsing(fn(int $state): string => match ($state) {
                        0 => 'กำลังดำเนินการ',
                        1 => 'เรียบร้อย',
                        default => '-',
                    })
                    ->searchable()
                    ->sortable(),
                Tables\Columns\TextColumn::make('RMTM_DATE')
                    ->dateTime('d-m-Y H:i:s')
                    ->searchable()
                    ->sortable(),
                Tables\Columns\TextColumn::make('JOB_NO')
                    ->searchable()
                    ->sortable(),
            ])
            ->filters([
                //
            ])
            ->defaultSort('OPEN_DATE', 'desc')

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
            RelationManagers\TrackjoblogsRelationManager::class,
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListJobOrders::route('/'),
            'create' => Pages\CreateJobOrder::route('/create'),
            'edit' => Pages\EditJobOrder::route('/{record}/edit'),
        ];
    }
}
