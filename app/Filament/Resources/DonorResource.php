<?php
namespace App\Filament\Resources;
use App\Filament\Resources\DonorResource\Pages;
use App\Models\Donor;
use Filament\Forms;
use Filament\Resources\Form;

use Filament\Resources\Resource;

use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Actions\EditAction;
use Filament\Tables\Actions\DeleteAction;
use Filament\Resources\Table;


class DonorResource extends Resource
{
    protected static ?string $model = Donor::class;
    protected static ?string $navigationIcon = 'heroicon-o-hand';

    public static function form(Form $form): Form
    {
        return $form->schema([
            TextInput::make('name')
                ->required()
                ->unique()
                ->label('Donor Name'),
    
            Textarea::make('description')
                ->label('Donor Description'),
        ]);
    }
    
    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('name')
                    ->sortable()
                    ->searchable()
                    ->label('Donor Name'),
    
                TextColumn::make('description')
                    ->label('Description'),
            ])
            ->actions([
                EditAction::make(),
                DeleteAction::make(),
            ]);
    }
    
    

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListDonors::route('/'),
            'create' => Pages\CreateDonor::route('/create'),
            'edit' => Pages\EditDonor::route('/{record}/edit'),
        ];
    }
}
