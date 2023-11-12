<?php

namespace App\Filament\Resources\OutResource\Pages;

use App\Filament\Resources\OutResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListOuts extends ListRecords
{
    protected static string $resource = OutResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
