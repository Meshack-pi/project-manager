<?php

namespace App\Filament\Resources\OutputResource\Pages;

use App\Filament\Resources\OutputResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\ListRecords;

class ListOutputs extends ListRecords
{
    protected static string $resource = OutputResource::class;

    protected function getActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
