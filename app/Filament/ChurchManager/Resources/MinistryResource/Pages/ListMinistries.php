<?php

namespace App\Filament\ChurchManager\Resources\MinistryResource\Pages;

use App\Filament\ChurchManager\Resources\MinistryResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListMinistries extends ListRecords
{
    protected static string $resource = MinistryResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
