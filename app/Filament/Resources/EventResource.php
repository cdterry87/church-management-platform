<?php

namespace App\Filament\Resources;

use Filament\Forms;
use Filament\Tables;
use App\Models\Event;
use Filament\Tables\Table;
use Filament\Resources\Resource;
use App\Filament\Resources\EventResource\Pages;
use App\Filament\Resources\EventResource\RelationManagers\AttendeesRelationManager;
use App\Filament\Resources\EventResource\RelationManagers\EventAttendanceRelationManager;
use App\Filament\Resources\EventResource\RelationManagers\EventVolunteersRelationManager;
use App\Filament\Resources\EventResource\RelationManagers\VolunteersRelationManager;

class EventResource extends Resource
{
    protected static ?string $model = Event::class;
    protected static ?string $navigationIcon = 'heroicon-o-calendar';

    public static function form(Forms\Form $form): Forms\Form
    {
        return $form->schema([
            Forms\Components\TextInput::make('name')->required(),
            Forms\Components\Textarea::make('description'),
            Forms\Components\DateTimePicker::make('start_at')->required(),
            Forms\Components\DateTimePicker::make('end_at'),
            Forms\Components\TextInput::make('location'),
            Forms\Components\Select::make('type')
                ->options(['service' => 'Service', 'meeting' => 'Meeting', 'outreach' => 'Outreach', 'other' => 'Other'])
                ->default('service'),
            Forms\Components\Toggle::make('is_recurring')->label('Recurring Event'),
        ]);
    }

    public static function table(Tables\Table $table): Tables\Table
    {
        return $table->columns([
            Tables\Columns\TextColumn::make('name')->sortable()->searchable(),
            Tables\Columns\TextColumn::make('start_at')->dateTime()->sortable(),
            Tables\Columns\TextColumn::make('end_at')->dateTime()->sortable(),
            Tables\Columns\TextColumn::make('location'),
        ])->actions([
            Tables\Actions\EditAction::make(),
            Tables\Actions\DeleteAction::make(),
        ])->bulkActions([
            Tables\Actions\DeleteBulkAction::make(),
        ]);
    }

    public static function getRelations(): array
    {
        return [
            AttendeesRelationManager::class,
            VolunteersRelationManager::class
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListEvents::route('/'),
            'create' => Pages\CreateEvent::route('/create'),
            'edit' => Pages\EditEvent::route('/{record}/edit'),
        ];
    }
}
