<?php

namespace App\Filament\Admin\Resources;

use Filament\Forms;
use Filament\Tables;
use App\Models\Church;
use Filament\Forms\Form;
use Filament\Tables\Table;
use Filament\Resources\Resource;
use Filament\Tables\Columns\TextColumn;
use App\Filament\Admin\Resources\ChurchResource\Pages;
use App\Filament\Admin\Resources\ChurchResource\RelationManagers\EventsRelationManager;
use App\Filament\Admin\Resources\ChurchResource\RelationManagers\ServicesRelationManager;
use App\Filament\Admin\Resources\ChurchResource\RelationManagers\LocationsRelationManager;
use App\Filament\Admin\Resources\ChurchResource\RelationManagers\MinistriesRelationManager;
use App\Filament\Admin\Resources\ChurchResource\RelationManagers\MediaSeriesRelationManager;
use App\Filament\Admin\Resources\ChurchResource\RelationManagers\StaffMembersRelationManager;
use App\Filament\Admin\Resources\ChurchResource\RelationManagers\ChurchManagersRelationManager;

class ChurchResource extends Resource
{
    protected static ?string $model = Church::class;
    protected static ?string $navigationIcon = 'heroicon-o-building-church';
    protected static ?string $navigationGroup = 'Church Management';
    protected static ?string $navigationLabel = 'Churches';

    public static function form(Form $form): Form
    {
        return $form->schema([
            Forms\Components\TextInput::make('name')
                ->required()
                ->maxLength(255),

            Forms\Components\TextInput::make('denomination')
                ->maxLength(255),

            Forms\Components\FileUpload::make('logo_path')
                ->label('Logo')
                ->directory('church-logos')
                ->image()
                ->maxSize(2048),

            Forms\Components\Textarea::make('description')
                ->rows(4)
                ->maxLength(1000),

            Forms\Components\TextInput::make('website')
                ->url()
                ->label('Website')
                ->placeholder('https://example.com'),

            Forms\Components\TextInput::make('contact_email')
                ->email()
                ->label('Contact Email'),

            Forms\Components\TextInput::make('contact_phone')
                ->label('Contact Phone'),
        ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('name')->sortable()->searchable(),
                TextColumn::make('denomination')->sortable()->searchable(),
                TextColumn::make('contact_email'),
                TextColumn::make('contact_phone'),
                TextColumn::make('created_at')
                    ->dateTime('M j, Y')
                    ->label('Created'),
            ])
            ->filters([])
            ->actions([
                Tables\Actions\ViewAction::make(),
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\DeleteBulkAction::make(),
            ]);
    }

    public static function getRelations(): array
    {
        return [
            ChurchManagersRelationManager::class,
            EventsRelationManager::class,
            LocationsRelationManager::class,
            MediaSeriesRelationManager::class,
            MinistriesRelationManager::class,
            ServicesRelationManager::class,
            StaffMembersRelationManager::class,
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListChurches::route('/'),
            'create' => Pages\CreateChurch::route('/create'),
            'edit' => Pages\EditChurch::route('/{record}/edit'),
            // 'view' => Pages\ViewChurch::route('/{record}'),
        ];
    }
}
