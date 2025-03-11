<?php


namespace App\Filament\Resources;

use App\Filament\Resources\ActivityResource\Pages;
use App\Models\Activity;
use Illuminate\Database\Eloquent\Model;
use Filament\Forms;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Resources\Form;
use Filament\Resources\Table;

class ActivityResource extends Resource
{
    public static function canView(Model $record): bool
    {
        return auth()->user()->id === $record->project->owner_id;
    }

    public static function form(Form $form): Form
    {
        return $form->schema([
            Forms\Components\Section::make('Activity Details')
                ->schema([
                    Forms\Components\TextInput::make('title')
                        ->label('Activity Title')
                        ->required()
                        ->maxLength(255),
                    Forms\Components\Textarea::make('target')
                        ->label('Target Description')
                        ->rows(3)
                        ->placeholder('Describe the expected outcome')
                        ->nullable(),
                    Forms\Components\Select::make('output_id')
                        ->label('Output / Goal')
                        ->relationship('output', 'title')
                        ->searchable()
                        ->required(),
                ])->collapsible(),

            Forms\Components\Section::make('Participants & Budget')
                ->schema([
                    // Forms\Components\TextInput::make('q1_progress')
                    //     ->label('Q1 Progress')
                    //     ->numeric()
                    //     ->placeholder('Enter progress for Q1')
                    //     ->nullable(),
                    Forms\Components\TextInput::make('total_participants')
                        ->label('Total Participants')
                        ->disabled()
                        ->reactive()
                        ->default(0),
                    Forms\Components\Grid::make(2)
                        ->schema([
                            Forms\Components\TextInput::make('male_participants')
                                ->label('Male')
                                ->numeric()
                                ->default(0)
                                ->reactive()
                                ->afterStateUpdated(fn ($state, callable $set, callable $get) => 
                $set('total_participants', (int)$state + (int)$get('female_participants'))
            ),
                            Forms\Components\TextInput::make('female_participants')
                                ->label('Female')
                                ->numeric()
                                ->default(0)
                                ->reactive()
                                ->afterStateUpdated(fn ($state, callable $set, callable $get) => 
                $set('total_participants', (int)$state + (int)$get('male_participants'))
            ),
                        ]),
                    
                        Forms\Components\TextInput::make('budget')
                        ->label('Budget (Ksh)')
                        ->numeric()
                        ->prefix('Ksh')
                        ->nullable(),
                    // Forms\Components\TextInput::make('progress_percentage')
                    //     ->label('Progress (%)')
                    //     ->rules('min:0', 'max:100')
                    //     ->default(0)
                    //     ->suffix('%')
                    //     ->required(),
                ])->collapsible(),

            Forms\Components\Section::make('Additional Comments')
                ->schema([
                    Forms\Components\Textarea::make('comments')
                        ->label('Comments')
                        ->rows(3)
                        ->placeholder('Enter additional remarks')
                        ->nullable(),
                ])->collapsible(),
        ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('title')
                    ->label('Activity')
                    ->sortable()
                    ->searchable()
                    ->limit(25),

                Tables\Columns\TextColumn::make('output.title')
                    ->label('Output/Goal')
                    ->limit(25)
                    ->sortable(),

                Tables\Columns\TextColumn::make('q1_progress')
                    ->label('Q1 Progress')
                    ->sortable(),

                Tables\Columns\TextColumn::make('total_participants')
                    ->label('Participants')
                    ->icon('heroicon-o-user-group')
                    ->sortable(),

                Tables\Columns\TextColumn::make('budget')
                    ->label('Budget (Ksh)')
                    ->sortable()
                    ->formatStateUsing(fn ($state) => number_format($state, 2)),

                Tables\Columns\TextColumn::make('progress_percentage')
                    ->label('Progress')
                    ->suffix('%')
                    ->sortable()
                    ->formatStateUsing(fn ($state) => "<div style='width: 100px; background: #f3f4f6; border-radius: 5px;'>
                        <div style='width: {$state}%; background: " . ($state < 50 ? '#f87171' : ($state < 80 ? '#facc15' : '#34d399')) . "; height: 10px; border-radius: 5px;'></div>
                    </div>")->html(),

                Tables\Columns\TextColumn::make('created_at')
                    ->label('Created At')
                    ->dateTime()
                    ->sortable(),
            ])
            ->filters([])
            ->actions([
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\DeleteBulkAction::make(),
            ]);
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListActivities::route('/'),
            'create' => Pages\CreateActivity::route('/create'),
            'edit' => Pages\EditActivity::route('/{record}/edit'),
        ];
    }
}
