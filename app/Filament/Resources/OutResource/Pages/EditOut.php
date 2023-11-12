<?php

namespace App\Filament\Resources\OutResource\Pages;

use App\Filament\Resources\OutResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditOut extends EditRecord
{
    protected static string $resource = OutResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
