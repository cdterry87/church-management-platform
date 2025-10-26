<?php

namespace App\Filament\Admin\Resources\UserChurchManagerResource\Pages;

use App\Filament\Admin\Resources\UserChurchManagerResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListUserChurchManagers extends ListRecords
{
    protected static string $resource = UserChurchManagerResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
