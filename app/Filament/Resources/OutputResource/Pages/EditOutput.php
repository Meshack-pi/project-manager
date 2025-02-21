<?php

namespace App\Filament\Resources\OutputResource\Pages;

use App\Filament\Resources\OutputResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\EditRecord;

class EditOutput extends EditRecord
{
    protected static string $resource = OutputResource::class;

    protected function getActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
