<?php

namespace App\Filament\Resources\Tourisms\Pages;

use App\Filament\Resources\Tourisms\TourismResource;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;

class ListTourisms extends ListRecords
{
    protected static string $resource = TourismResource::class;

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make(),
        ];
    }
}
