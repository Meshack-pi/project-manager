<?php

namespace App\Filament\Resources\ProjectResource\Pages;

use App\Filament\Resources\ProjectResource;
use Filament\Pages\Actions\Action;
use Filament\Pages\Actions\EditAction;
use Filament\Resources\Pages\ViewRecord;

class CustomViewProject extends ViewRecord
{
    protected static string $resource = ProjectResource::class;
    protected static string $view = 'filament.resources.project-resource.pages.custom-view-project';

    protected function getActions(): array
    {
        return [
            Action::make('kanban')
                ->label(fn () => $this->record->type === 'scrum' ? 'Scrum Board' : 'Kanban Board')
                ->icon('heroicon-o-view-boards')
                ->color('secondary')
                ->url(fn () => route(
                    'filament.pages.' . ($this->record->type === 'scrum' ? 'scrum' : 'kanban'),
                    ['project' => $this->record->id]
                )),
            EditAction::make(),
        ];
    }
}