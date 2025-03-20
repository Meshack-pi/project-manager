<?php

namespace App\Filament\Resources;

use App\Filament\Resources\ReportResource\Pages;
use App\Models\Project;
use Filament\Resources\Resource;
use Filament\Resources\Table;
use Filament\Tables;
use Filament\Tables\Columns\TextColumn;

class ReportResource extends Resource
{
    protected static ?string $model = Project::class; // Displaying all projects

    protected static ?string $navigationLabel = 'Reports';
    protected static ?string $navigationIcon = 'heroicon-o-document-report';
    protected static ?string $slug = 'reports';

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('title')->label('Project Name'),
                TextColumn::make('status')->label('Project Status'),
            ]);
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListReports::route('/'),
            'create' => Pages\CreateReport::route('/create'),
            'edit' => Pages\EditReport::route('/{record}/edit'),
        ];
    }
}
