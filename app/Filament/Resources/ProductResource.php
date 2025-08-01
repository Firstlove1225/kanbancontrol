<?php

namespace App\Filament\Resources;

use App\Filament\Resources\ProductResource\Pages;
use App\Filament\Resources\ProductResource\RelationManagers;
use App\Models\Product;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class ProductResource extends Resource
{
    protected static ?string $model = Product::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('FCSKID')
                    ->required()
                    ->maxLength(255)
                    ->disabled(),
                Forms\Components\TextInput::make('FCCORP')
                    ->required()
                    ->maxLength(255)
                    ->disabled(),
                Forms\Components\TextInput::make('FCTYPE')
                    ->required()
                    ->maxLength(255)
                    ->disabled(),
                Forms\Components\TextInput::make('FCCODE')
                    ->required()
                    ->maxLength(255)
                    ->disabled(),
                Forms\Components\TextInput::make('FCNAME')
                    ->required()
                    ->maxLength(255)
                    ->disabled(),
                Forms\Components\TextInput::make('FCSNAME')
                    ->required()
                    ->maxLength(255)
                    ->disabled(),
                Forms\Components\TextInput::make('FNSTDCOST')
                    ->numeric()
                    ->required()
                    ->disabled(),
                Forms\Components\TextInput::make('um.FCNAME')
                    ->label('หน่วยนับ')
                    ->disabled()
                    ->maxLength(255),
                Forms\Components\TextInput::make('FNPRICE')
                    ->numeric()
                    ->required()
                    ->disabled(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->modifyQueryUsing(fn(Builder $query) => $query->whereIn('FCTYPE', ['1', '5']))
            ->columns([
                Tables\Columns\TextColumn::make('FCSKID')
                    ->label('รหัสลับ')
                    ->searchable(),
                Tables\Columns\TextColumn::make('corp.FCNAME')
                    ->label('Company Name')
                    ->searchable(),
                Tables\Columns\TextColumn::make('FCTYPE')
                    ->searchable(),
                Tables\Columns\TextColumn::make('FCCODE')
                    ->searchable(),
                Tables\Columns\TextColumn::make('FCNAME')
                    ->searchable(),
                Tables\Columns\TextColumn::make('FCSNAME')
                    ->searchable(),
                Tables\Columns\TextColumn::make('FNSTDCOST')
                    ->searchable(),
                Tables\Columns\TextColumn::make('um.FCNAME')
                    ->label('หน่วยนับ')
                    ->searchable(),
                Tables\Columns\TextColumn::make('FNPRICE')
                    ->searchable(),
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\ViewAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([]),
            ]);
    }

    public static function getRelations(): array
    {
        return [
            RelationManagers\StocksRelationManager::class,
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListProducts::route('/'),
            'view' => Pages\ViewProduct::route('/{record}'),
        ];
    }
}
