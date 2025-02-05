<?php

namespace App\Filament\Widgets;

use Filament\Widgets\Widget;
use Illuminate\Support\HtmlString;

class GoToProjects extends Widget
{
    protected static string $view = 'filament.widgets.go-to-projects';
    protected static ?string $heading = 'Go to Projects';
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
                <img src="' . asset('img/humanitarian.jpg') . '" alt="Projects" class="w-full h-auto rounded-md" />
                <a href="' . url('/projects') . '" class="w-full text-center block text-white bg-primary-600 hover:bg-primary-700 rounded py-2">
                    Go to Projects
                </a>
            </div>
        ';
    }
}
