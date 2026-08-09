<?php

namespace App\Filament\Resources\Tourisms\Pages;

use App\Filament\Resources\Tourisms\TourismResource;
use Filament\Actions\DeleteAction;
use Filament\Resources\Pages\EditRecord;

class EditTourism extends EditRecord
{
    protected static string $resource = TourismResource::class;

    protected function getHeaderActions(): array
    {
        return [
            DeleteAction::make(),
        ];
    }
}
