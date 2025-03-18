<?php

namespace App\Filament\Pages;

use App\Filament\Widgets\FavoriteProjects;
use App\Filament\Widgets\LatestProjects;
use Filament\Pages\Dashboard as BasePage;
use App\Filament\Widgets\GoToProjects;
use App\Filament\Widgets\GoToReports;

class Dashboard extends BasePage
{
    protected static bool $shouldRegisterNavigation = false;

    protected function getColumns(): int | array
    {
        return 6;
    }

    protected function getWidgets(): array
    {
        return [
            GoToProjects::class,
            GoToReports::class,
            LatestProjects::class,
            FavoriteProjects::class,
        ];
    }
}
