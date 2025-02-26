<?php

namespace App\Filament\Resources\ProjectResource\Pages;

use App\Filament\Resources\ProjectResource;
use App\Filament\Widgets\ProjectDetailsWidget;
use App\Filament\Widgets\MonthlyReportsWidget;
use App\Filament\Widgets\OutputsWidget;
use App\Models\Project;
use Filament\Pages\Page;

class ProjectDetails extends Page
{
    protected static string $resource = ProjectResource::class;
    protected static string $view = 'filament.resources.project-resource.pages.project-details';

    public Project $record;

    // Define the route path for this page
    public static function getRouteName(): string
    {
        return 'filament.resources.projects.view';
    }

    public static function getRoutePath(): string
    {
        return '/{record}/view';
    }

    // Mount method to load the record based on the route parameter
    public function mount($record): void
    {
        $this->record = Project::findOrFail($record);
    }

    protected function getColumns(): int | array
    {
        return 6; // Adjust the number of columns as needed
    }

    protected function getWidgets(): array
    {
        return [
            ProjectDetailsWidget::class,
            MonthlyReportsWidget::class,
            OutputsWidget::class,
        ];
    }

    protected function getWidgetData(): array
    {
        return [
            'record' => $this->record,
        ];
    }
}