<?php

namespace App\Filament\Resources;

use App\Filament\Resources\PersonResource\Pages;
use App\Models\Person;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables\Table;
use Filament\Tables;

class PersonResource extends Resource
{
    protected static ?string $model = Person::class;
    protected static ?string $navigationIcon = 'heroicon-o-user';

    public static function form(Form $form): Form
    {
        return $form->schema([
            Forms\Components\TextInput::make('first_name')->required(),
            Forms\Components\TextInput::make('last_name')->required(),
            Forms\Components\TextInput::make('email')->email(),
            Forms\Components\TextInput::make('phone'),
            Forms\Components\Select::make('family_id')
                ->relationship('family', 'name')
                ->searchable()
                ->preload(),
            Forms\Components\Select::make('user_id')
                ->relationship('user', 'name')
                ->searchable()
                ->preload(),
            Forms\Components\DatePicker::make('birthdate'),
            Forms\Components\Select::make('gender')
                ->options(['male' => 'Male', 'female' => 'Female', 'other' => 'Other']),
            Forms\Components\Select::make('status')
                ->options(['member' => 'Member', 'guest' => 'Guest', 'inactive' => 'Inactive'])
                ->default('member'),
            Forms\Components\Textarea::make('notes'),
        ]);
    }

    public static function table(Table $table): Table
    {
        return $table->columns([
            Tables\Columns\TextColumn::make('full_name')->sortable()->searchable(),
            Tables\Columns\TextColumn::make('email'),
            Tables\Columns\TextColumn::make('phone'),
            Tables\Columns\TextColumn::make('status'),
        ])->actions([
            Tables\Actions\EditAction::make(),
            Tables\Actions\DeleteAction::make(),
        ])->bulkActions([
            Tables\Actions\DeleteBulkAction::make(),
        ]);
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListPeople::route('/'),
            'create' => Pages\CreatePerson::route('/create'),
            'edit' => Pages\EditPerson::route('/{record}/edit'),
        ];
    }
}
