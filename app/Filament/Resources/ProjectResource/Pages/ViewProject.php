<?php

namespace App\Filament\Resources\ProjectResource\Pages;

use App\Filament\Resources\ProjectResource;
use App\Models\Project;
use Filament\Pages\Actions\Action;
use Filament\Pages\Actions\EditAction;
use Filament\Resources\Pages\ViewRecord;

class ViewProject extends ViewRecord
{
    protected static string $resource = ProjectResource::class;
    protected static string $view = 'filament.resources.project-resource.pages.view-project';

    protected function getActions(): array
    {
        return [
            Action::make('edit')
                ->label('Edit Project')
                ->icon('heroicon-o-pencil')
                ->url(fn () => route('filament.resources.projects.edit', [
                    'record' => $this->record,
                    'activeRelationManager' => 1,
                ])),
        ];
    }
}