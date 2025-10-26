<?php

namespace App\Filament\Admin\Resources\ChurchResource\RelationManagers;

use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\RelationManagers\RelationManager;
use Filament\Tables;
use Filament\Tables\Table;

class StaffMembersRelationManager extends RelationManager
{
    protected static string $relationship = 'staffMembers';
    protected static ?string $title = 'Staff Members';

    public function form(Form $form): Form
    {
        return $form->schema([
            Forms\Components\FileUpload::make('photo_path')
                ->label('Photo')
                ->image()
                ->directory('church-staff-photos')
                ->maxSize(2048),

            Forms\Components\TextInput::make('name')
                ->required()
                ->maxLength(255),

            Forms\Components\TextInput::make('role')
                ->required()
                ->label('Title / Role')
                ->placeholder('e.g., Lead Pastor, Worship Director'),

            Forms\Components\TextInput::make('email')
                ->email()
                ->label('Email'),

            Forms\Components\TextInput::make('phone')
                ->label('Phone'),

            Forms\Components\Textarea::make('bio')
                ->rows(4)
                ->maxLength(1000)
                ->label('Short Bio'),
        ]);
    }

    public function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\ImageColumn::make('photo_path')
                    ->label('Photo')
                    ->circular(),
                Tables\Columns\TextColumn::make('name')
                    ->sortable()
                    ->searchable(),
                Tables\Columns\TextColumn::make('role')
                    ->label('Role')
                    ->sortable()
                    ->searchable(),
                Tables\Columns\TextColumn::make('email')
                    ->label('Email'),
                Tables\Columns\TextColumn::make('phone')
                    ->label('Phone'),
            ])
            ->headerActions([
                Tables\Actions\CreateAction::make(),
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\DeleteBulkAction::make(),
            ]);
    }
}
