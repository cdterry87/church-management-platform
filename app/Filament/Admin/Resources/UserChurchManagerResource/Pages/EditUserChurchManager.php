<?php

namespace App\Filament\Admin\Resources\UserChurchManagerResource\Pages;

use App\Filament\Admin\Resources\UserChurchManagerResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditUserChurchManager extends EditRecord
{
    protected static string $resource = UserChurchManagerResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
