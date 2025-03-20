<?php

namespace App\Filament\Widgets;

use Filament\Widgets\Widget;
use Illuminate\Support\HtmlString;

class GoToReports extends Widget
{
    protected static string $view = 'filament.widgets.go-to-reports';
    protected static ?string $heading = 'Go to Reports';
    protected int|string|array $columnSpan = [
        'sm' => 1,
        'md' => 6,
        'lg' => 3,
    ];

    // Return a string of HTML content
    protected function getContent(): string
    {
        return '
            <div class="flex flex-col items-center gap-4 p-4">
                <img src="' . asset('img/reports.jpg') . '" alt="Projects" class="w-full h-auto rounded-md" />
                <a href="' . url('/reports') . '" class="w-full text-center block text-white bg-primary-700 hover:bg-primary-600 rounded py-2">
                    Go to Reports
                </a>
            </div>
        ';
    }
}
