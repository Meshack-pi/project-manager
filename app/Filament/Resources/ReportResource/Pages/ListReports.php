<?php

namespace App\Filament\Resources\ReportResource\Pages;

use App\Filament\Resources\ReportResource;
use App\Models\Project;
use Filament\Pages\Actions;
use Filament\Resources\Pages\ListRecords;
use Filament\Forms\Components\Select;
use Filament\Forms\Form;
use Illuminate\Database\Eloquent\Builder;

class ListReports extends ListRecords
{
    protected static string $resource = ReportResource::class;

    protected function getTableQuery(): Builder
    {
        $selectedProjectId = request()->query('project_id');

        return $selectedProjectId 
            ? Project::where('id', $selectedProjectId) 
            : Project::query();
    }

    protected function getHeaderWidgets(): array
    {
        return [
            Select::make('project_id')
                ->label('Select Project')
                ->options(Project::all()->pluck('title', 'id'))
                ->reactive()
                ->afterStateUpdated(fn ($state) => $this->redirectRoute('filament.admin.resources.reports.index', ['project_id' => $state])),
        ];
    }
}
