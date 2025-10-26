<?php

namespace App\Filament\Admin\Resources;

use App\Filament\Admin\Resources\UserChurchManagerResource\Pages;
use App\Models\UserChurchManager;
use App\Models\Church;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Support\Facades\Hash;

class UserChurchManagerResource extends Resource
{
    protected static ?string $model = UserChurchManager::class;
    protected static ?string $navigationIcon = 'heroicon-o-user-group';
    protected static ?string $navigationGroup = 'User Management';
    protected static ?string $navigationLabel = 'Church Managers';
    protected static ?string $slug = 'church-managers';

    public static function form(Form $form): Form
    {
        return $form->schema([
            Forms\Components\TextInput::make('name')
                ->required()
                ->maxLength(255),

            Forms\Components\TextInput::make('email')
                ->required()
                ->email()
                ->unique(ignoreRecord: true),

            Forms\Components\TextInput::make('password')
                ->password()
                ->dehydrateStateUsing(fn($state) => filled($state) ? Hash::make($state) : null)
                ->dehydrated(fn($state) => filled($state))
                ->label('Password')
                ->maxLength(255)
                ->visibleOn('create'),

            Forms\Components\Select::make('church_id')
                ->label('Church')
                ->options(Church::pluck('name', 'id'))
                ->searchable()
                ->required(),

            Forms\Components\Toggle::make('is_active')
                ->label('Active')
                ->default(true),
        ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('name')->sortable()->searchable(),
                Tables\Columns\TextColumn::make('email')->sortable()->searchable(),
                Tables\Columns\TextColumn::make('church.name')->label('Church'),
                Tables\Columns\IconColumn::make('is_active')
                    ->boolean()
                    ->label('Active'),
                Tables\Columns\TextColumn::make('created_at')
                    ->dateTime('M j, Y')
                    ->label('Created'),
            ])
            ->filters([
                Tables\Filters\SelectFilter::make('church_id')
                    ->relationship('church', 'name')
                    ->label('Church'),
            ])
            ->actions([
                Tables\Actions\ViewAction::make(),
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\DeleteBulkAction::make(),
            ]);
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListUserChurchManagers::route('/'),
            'create' => Pages\CreateUserChurchManager::route('/create'),
            'edit' => Pages\EditUserChurchManager::route('/{record}/edit'),
            // 'view' => Pages\ViewUserChurchManager::route('/{record}'),
        ];
    }
}
