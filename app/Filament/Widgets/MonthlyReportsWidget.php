<?php

namespace App\Filament\Widgets;

use Filament\Widgets\Widget;

class MonthlyReportsWidget extends Widget
{
    protected static string $view = 'filament.widgets.monthly-reports-widget';
    protected static ?string $heading = 'Monthly Reports';

    protected function getContent(): string
    {
        return '
            <p class="text-gray-600">No reports available.</p>
        ';
    }
}