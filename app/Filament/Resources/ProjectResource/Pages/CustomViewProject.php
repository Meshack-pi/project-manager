<?php

namespace App\Filament\Resources\ProjectResource\Pages;

use App\Filament\Resources\ProjectResource;
use Filament\Pages\Actions\EditAction;
use Filament\Resources\Pages\ViewRecord;

class CustomViewProject extends ViewRecord
{
    protected static string $resource = ProjectResource::class;
    protected static string $view = 'filament.resources.project-resource.pages.custom-view-project';

    protected function getActions(): array
    {
        return [
            EditAction::make(),
        ];
    }
}
