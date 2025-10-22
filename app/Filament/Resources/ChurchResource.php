<?php

namespace App\Filament\Resources;

use App\Filament\Resources\ChurchResource\Pages;
use App\Models\Church;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables\Table;
use Filament\Tables;

class ChurchResource extends Resource
{
    protected static ?string $model = Church::class;
    protected static ?string $navigationIcon = 'heroicon-o-office-building';

    public static function form(Form $form): Form
    {
        return $form->schema([
            Forms\Components\TextInput::make('name')->required()->maxLength(255),
            Forms\Components\TextInput::make('slug')->required()->maxLength(255),
            Forms\Components\TextInput::make('address')->maxLength(255),
            Forms\Components\TextInput::make('city')->maxLength(100),
            Forms\Components\TextInput::make('state')->maxLength(50),
            Forms\Components\TextInput::make('zip')->maxLength(20),
            Forms\Components\TextInput::make('phone')->maxLength(50),
            Forms\Components\TextInput::make('timezone')->maxLength(50)->default('UTC'),
        ]);
    }

    public static function table(Table $table): Table
    {
        return $table->columns([
            Tables\Columns\TextColumn::make('name')->sortable()->searchable(),
            Tables\Columns\TextColumn::make('city'),
            Tables\Columns\TextColumn::make('state'),
            Tables\Columns\TextColumn::make('phone'),
        ])->filters([
            //
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
            'index' => Pages\ListChurches::route('/'),
            'create' => Pages\CreateChurch::route('/create'),
            'edit' => Pages\EditChurch::route('/{record}/edit'),
        ];
    }
}
