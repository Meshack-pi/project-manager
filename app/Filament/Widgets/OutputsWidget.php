<?php

namespace App\Filament\Widgets;

use App\Models\Project;
use Filament\Widgets\Widget;

class OutputsWidget extends Widget
{
    protected static string $view = 'filament.widgets.outputs-widget';
    protected static ?string $heading = 'Outputs';

    public ?Project $record = null;

    protected function getContent(): string
    {
        $outputs = $this->record->outputs;

        $outputsHtml = '';
        foreach ($outputs as $output) {
            $outputsHtml .= '
                <li class="border-b pb-4">
                    <div class="flex justify-between items-center">
                        <div>
                            <h3 class="text-lg font-medium">' . $output->title . '</h3>
                            <p class="text-gray-600">' . $output->description . '</p>
                        </div>
                        <a href="' . route('filament.resources.outputs.activities', $output) . '" class="text-blue-500 hover:text-blue-700">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                            </svg>
                        </a>
                    </div>
                </li>
            ';
        }

        return '
            <ul class="space-y-4">' . $outputsHtml . '</ul>
            <a href="' . route('filament.resources.projects.outputs', $this->record) . '" class="mt-4 inline-block bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600">
                View All Outputs
            </a>
        ';
    }
}