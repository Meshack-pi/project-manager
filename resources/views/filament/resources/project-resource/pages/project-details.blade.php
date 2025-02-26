<x-filament::page>
    <x-filament::widget>
        {{ \App\Filament\Widgets\ProjectDetailsWidget::make(['record' => $record]) }}
    </x-filament::widget>

    <x-filament::widget>
        {{ \App\Filament\Widgets\MonthlyReportsWidget::make(['record' => $record]) }}
    </x-filament::widget>

    <x-filament::widget>
        {{ \App\Filament\Widgets\OutputsWidget::make(['record' => $record]) }}
    </x-filament::widget>
</x-filament::page>