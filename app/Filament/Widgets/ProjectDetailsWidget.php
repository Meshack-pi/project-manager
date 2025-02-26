<?php

namespace App\Filament\Widgets;

use App\Models\Project;
use Filament\Widgets\Widget;

class ProjectDetailsWidget extends Widget
{
    protected static string $view = 'filament.widgets.project-details-widget';
    protected static ?string $heading = 'Project Details';

    public ?Project $record = null;

    protected function getContent(): string
    {
        return '
            <div class="space-y-4">
                <p><strong>Name:</strong> ' . $this->record->name . '</p>
                <p><strong>Budget:</strong> ' . $this->record->budget . ' ' . $this->record->budget_currency . '</p>
                <p><strong>Start Date:</strong> ' . $this->record->start_date->format('Y-m-d') . '</p>
                <p><strong>End Date:</strong> ' . $this->record->end_date->format('Y-m-d') . '</p>
            </div>
        ';
    }
}