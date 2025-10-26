<?php

namespace App\Filament\ChurchManager\Resources\MinistryResource\Pages;

use App\Filament\ChurchManager\Resources\MinistryResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditMinistry extends EditRecord
{
    protected static string $resource = MinistryResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
