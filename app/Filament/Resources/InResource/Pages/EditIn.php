<?php

namespace App\Filament\Resources\InResource\Pages;

use App\Filament\Resources\InResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditIn extends EditRecord
{
    protected static string $resource = InResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
