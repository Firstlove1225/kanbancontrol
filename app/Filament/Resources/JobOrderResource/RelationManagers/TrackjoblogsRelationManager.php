<?php

namespace App\Filament\Resources\JobOrderResource\RelationManagers;

use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\RelationManagers\RelationManager;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class TrackjoblogsRelationManager extends RelationManager
{
    protected static string $relationship = 'trackjoblogs';

    public function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('KANBAN')
                    ->maxLength(255),
                Forms\Components\TextInput::make('CPART_NO')
                    ->maxLength(255),
                Forms\Components\TextInput::make('STEP')
                    ->maxLength(255),
                Forms\Components\TextInput::make('WORK_NAME')
                    ->maxLength(255),
                Forms\Components\TextInput::make('CT')
                    ->numeric(),
                Forms\Components\TextInput::make('AC_CT')
                    ->numeric(),
                Forms\Components\DateTimePicker::make('STARTDATE')
                    ->format('Y-m-d H:i:s')
                    ->nullable(),
                Forms\Components\DateTimePicker::make('ENDDATE')
                    ->format('Y-m-d H:i:s')
                    ->nullable(),
                Forms\Components\TextInput::make('STATUS')
                    ->maxLength(255),
                Forms\Components\DateTimePicker::make('ACT_STARTDATE')
                    ->format('Y-m-d H:i:s')
                    ->nullable(),
                Forms\Components\TextInput::make('JOB_NO')
                    ->maxLength(255)
                    ->disabled(), // JOB_NO should be disabled as it's from the parent
                Forms\Components\TextInput::make('TYPE_USER')
                    ->maxLength(255),
                Forms\Components\TextInput::make('FACTORY')
                    ->maxLength(255),
                Forms\Components\TextInput::make('SUPCODE')
                    ->maxLength(255),
                Forms\Components\TextInput::make('FNQTY')
                    ->numeric(),
                Forms\Components\TextInput::make('FNBACKQTY')
                    ->numeric(),
                Forms\Components\TextInput::make('PART_COATING')
                    ->maxLength(255),
                Forms\Components\TextInput::make('COMPUTERNAME')
                    ->maxLength(255),
                Forms\Components\TextInput::make('FNSAVEQTY')
                    ->numeric(),
            ]);
    }

    public function table(Table $table): Table
    {
        return $table
            ->recordTitleAttribute('JOB_NO')
            ->columns([
                Tables\Columns\TextColumn::make('KANBAN'),
                Tables\Columns\TextColumn::make('CPART_NO'),
                Tables\Columns\TextColumn::make('STEP'),
                Tables\Columns\TextColumn::make('WORK_NAME'),
                Tables\Columns\TextColumn::make('CT'),
                Tables\Columns\TextColumn::make('AC_CT'),
                Tables\Columns\TextColumn::make('STARTDATE')
                    ->dateTime(),
                Tables\Columns\TextColumn::make('ENDDATE')
                    ->dateTime(),
                Tables\Columns\TextColumn::make('STATUS'),
                // Tables\Columns\TextColumn::make('ACT_STARTDATE')
                //  ->dateTime(),
                Tables\Columns\TextColumn::make('JOB_NO'),
                // Tables\Columns\TextColumn::make('TYPE_USER'),
                // Tables\Columns\TextColumn::make('FACTORY'),
                // Tables\Columns\TextColumn::make('SUPCODE'),
                Tables\Columns\TextColumn::make('FNQTY'),
                Tables\Columns\TextColumn::make('FNBACKQTY'),
                Tables\Columns\TextColumn::make('PART_COATING'),
                Tables\Columns\TextColumn::make('COMPUTERNAME'),
                // Tables\Columns\TextColumn::make('FNSAVEQTY'),
            ])
            ->filters([
                //
            ])
            ->headerActions([
                Tables\Actions\CreateAction::make(),
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
}
