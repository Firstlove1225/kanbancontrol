<?php

namespace App\Filament\Resources;

use App\Filament\Resources\StockResource\Pages;
use App\Filament\Resources\StockResource\RelationManagers;
use App\Models\Stock;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class StockResource extends Resource
{
    protected static ?string $model = Stock::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
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
                Forms\Components\Select::make('FCPROD')
                    ->relationship('product', 'FCNAME')
                    ->required(),
                Forms\Components\TextInput::make('FCLOT')
                    ->required()
                    ->maxLength(255),
                Forms\Components\TextInput::make('FNQTY')
                    ->numeric()
                    ->required(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->modifyQueryUsing(fn(Builder $query) => $query->whereHas('whouse', fn ($query) => $query->byFcCode()))
            ->columns([
                Tables\Columns\TextColumn::make('FCSKID')
                    ->searchable(),
                // Tables\Columns\TextColumn::make('FCCORP')
                // ->searchable(),
                Tables\Columns\TextColumn::make('whouse.FCNAME')
                    ->label('Warehouse Name')
                    ->searchable(),
                Tables\Columns\TextColumn::make('product.FCNAME')
                    ->label('Product Name')
                    ->searchable(),
                Tables\Columns\TextColumn::make('FCLOT')
                    ->searchable(),
                Tables\Columns\TextColumn::make('FNQTY')
                    ->searchable(),
            ])
            ->filters([
                //
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

    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListStocks::route('/'),
            'create' => Pages\CreateStock::route('/create'),
            'edit' => Pages\EditStock::route('/{record}/edit'),
        ];
    }
}
