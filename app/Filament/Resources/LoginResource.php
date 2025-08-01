<?php

namespace App\Filament\Resources;

use App\Filament\Resources\LoginResource\Pages;
use App\Filament\Resources\LoginResource\RelationManagers;
use App\Models\Login;
use Filament\Forms;
use Filament\Forms\Components\Grid;
use Filament\Forms\Components\Section;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Illuminate\Support\Facades\Hash;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class LoginResource extends Resource
{
    protected static ?string $model = Login::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';
    protected static ?string $navigationLabel = 'LOGIN';
    protected static ?string $label = 'LOGIN';



    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Section::make('Login Details')
                    ->schema([
                        Grid::make(2)
                            ->schema([
                                Forms\Components\TextInput::make('ID')
                                    ->numeric()
                                    ->disabled(),
                                // ->required()

                                // ->disabled(fn(?string $operation) => $operation === 'edit'),
                                Forms\Components\TextInput::make('LOGIN_ID')
                                    ->maxLength(255),

                            ]),
                        Grid::make(2)
                            ->schema([
                                Forms\Components\TextInput::make('NAME')
                                    ->maxLength(255),
                                Forms\Components\TextInput::make('LAST_NAME')
                                    ->maxLength(255),
                            ]),
                        Grid::make(2)

                            ->schema([
                                Forms\Components\TextInput::make('PASSWORD')
                                    //  ->password()
                                    ->maxLength(255),
                                // ->dehydrateStateUsing(fn(string $state): string => Hash::make($state))
                                // ->dehydrated(fn(?string $state): bool => filled($state))
                                // ->required(fn(string $operation): bool => $operation === 'create'),
                                Forms\Components\TextInput::make('PICTURE')
                                    ->maxLength(255),
                            ]),
                        Grid::make(2)
                            ->schema([
                                Forms\Components\Select::make('PERMISSION')
                                    ->options([
                                        'ADMIN' => 'ADMIN',
                                        'PD' => 'PD',
                                        'PL' => 'PL',
                                        'IC' => 'IC',
                                    ])
                                    ->default('ADMIN'),
                                Forms\Components\Toggle::make('IS_ACTIVE')
                                    ->default(true),
                            ]),
                        Grid::make(1)
                            ->schema([
                                Forms\Components\DateTimePicker::make('CREATED_AT'),
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
                Tables\Columns\TextColumn::make('LOGIN_ID')
                    ->searchable()
                    ->sortable(),
                Tables\Columns\TextColumn::make('NAME')
                    ->searchable()
                    ->sortable(),
                Tables\Columns\TextColumn::make('LAST_NAME')
                    ->searchable()
                    ->sortable(),
                Tables\Columns\TextColumn::make('PICTURE')
                    ->searchable()
                    ->sortable(),
                Tables\Columns\TextColumn::make('PERMISSION')
                    ->searchable()
                    ->sortable(),
                Tables\Columns\IconColumn::make('IS_ACTIVE')
                    ->boolean(),
                Tables\Columns\TextColumn::make('CREATED_AT')
                    ->dateTime()
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
            'index' => Pages\ListLogins::route('/'),
            'create' => Pages\CreateLogin::route('/create'),
            'edit' => Pages\EditLogin::route('/{record}/edit'),
        ];
    }
}
