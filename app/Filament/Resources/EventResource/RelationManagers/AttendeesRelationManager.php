<?php

namespace App\Filament\Resources\EventResource\RelationManagers;

use Filament\Forms;
use Filament\Resources\RelationManagers\RelationManager;
use Filament\Tables\Table;
use Filament\Tables;

class AttendeesRelationManager extends RelationManager
{
    protected static string $relationship = 'attendees';
    protected static ?string $recordTitleAttribute = 'person.full_name';

    public function table(Table $table): Table
    {
        return $table->columns([
            Tables\Columns\TextColumn::make('person.full_name')->label('Attendee'),
            Tables\Columns\TextColumn::make('attended')->boolean(),
            Tables\Columns\TextColumn::make('checked_in_at')->dateTime(),
        ])->filters([
            //
        ])->headerActions([
            Tables\Actions\CreateAction::make(),
        ])->actions([
            Tables\Actions\EditAction::make(),
            Tables\Actions\DeleteAction::make(),
        ]);
    }

    public function form(Forms\Form $form): Forms\Form
    {
        return $form->schema([
            Forms\Components\Select::make('person_id')
                ->relationship('person', 'full_name')
                ->searchable()
                ->required(),
            Forms\Components\Toggle::make('attended'),
            Forms\Components\DateTimePicker::make('checked_in_at'),
        ]);
    }
}
