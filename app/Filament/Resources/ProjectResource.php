<?php

namespace App\Filament\Resources;

use App\Filament\Resources\ProjectResource\Pages;
use App\Filament\Resources\ProjectResource\RelationManagers;
use App\Models\Project;
use App\Models\ProjectFavorite;
use App\Models\ProjectStatus;
use App\Models\Donor;
use App\Models\User;
use Filament\Facades\Filament;
use Carbon\Carbon;
use Filament\Forms;
use Filament\Resources\Form;
use Filament\Resources\Resource;
use Filament\Resources\Table;
use Filament\Tables;
use Illuminate\Support\HtmlString;
use Illuminate\Support\Str;
use Maatwebsite\Excel\Facades\Excel;


class ProjectResource extends Resource
{
    protected static ?string $model = Project::class;

    protected static ?string $navigationIcon = 'heroicon-o-archive';

    protected static ?int $navigationSort = 1;

    protected static function getNavigationLabel(): string
    {
        return __('Projects');
    }

    public static function getPluralLabel(): ?string
    {
        return static::getNavigationLabel();
    }

    protected static function getNavigationGroup(): ?string
    {
        return __('Management');
    }

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                // Card for basic project details
                Forms\Components\Card::make()
                    ->schema([
                        Forms\Components\Grid::make()
                            ->columns(['default' => 1, 'md' => 3])
                            ->schema([
                                Forms\Components\SpatieMediaLibraryFileUpload::make('cover')
                                    ->label(__('Cover image'))
                                    ->image()
                                    ->helperText(__('If not selected, an image will be generated based on the project name'))
                                    ->columnSpan(['default' => 1, 'md' => 1]),

                                Forms\Components\Grid::make()
                                    ->columnSpan(['default' => 1, 'md' => 2])
                                    ->schema([
                                        Forms\Components\Grid::make()
                                            ->columns(['default' => 1, 'md' => 12])
                                            ->schema([
                                                Forms\Components\TextInput::make('name')
                                                    ->label(__('Project name'))
                                                    ->required()
                                                    ->columnSpan(['default' => 1, 'md' => 10])
                                                    ->maxLength(255),

                                                // Forms\Components\TextInput::make('project_prefix')
                                                //     ->label(__('Project prefix'))
                                                //     ->maxLength(3)
                                                //     ->columnSpan(['default' => 1, 'md' => 2])
                                                //     ->unique(Project::class, column: 'project_prefix', ignoreRecord: true)
                                                //     ->disabled(fn($record) => $record && $record->tickets()->count() != 0)
                                                //     ->reactive()
                                                //     ->required()
                                                //     ->afterStateUpdated(fn ($state, callable $set) => 
                                                //     $set('project_code', strtoupper($state . '-' . now()->year . '-' . Str::upper(Str::random(5))))
                                                // ),
                                            ]),

                                        Forms\Components\Select::make('owner_id')
                                            ->label(__('Project owner'))
                                            ->searchable()
                                            ->options(fn() => User::all()->pluck('name', 'id')->toArray())
                                            ->default(fn() => auth()->user()->id)
                                            ->required(),

                                        Forms\Components\Select::make('status_id')
                                            ->label(__('Project status'))
                                            ->searchable()
                                            ->options(fn() => ProjectStatus::all()->pluck('name', 'id')->toArray())
                                            ->default(fn() => ProjectStatus::where('is_default', true)->first()?->id)
                                            ->required(),
                                    ]),

                                Forms\Components\RichEditor::make('description')
                                    ->label(__('Project description'))
                                    ->columnSpan(['default' => 1, 'md' => 3]),


                                Forms\Components\Select::make('status_type')
                                    ->label(__('Statuses configuration'))
                                    ->helperText(__('If custom type selected, you need to configure project specific statuses'))
                                    ->searchable()
                                    ->options([
                                        'default' => __('Default'),
                                        'custom' => __('Custom configuration'),
                                    ])
                                    ->default(fn() => 'default')
                                    ->required(),
                            ]),
                    ]),

                Forms\Components\Card::make()
                    ->schema([
                        Forms\Components\Grid::make()
                            ->columns(['default' => 1, 'md' => 2])
                            ->schema([
                                Forms\Components\DatePicker::make('start_date')
                                    ->label(__('Start date'))
                                    ->required(),

                                Forms\Components\DatePicker::make('end_date')
                                    ->label(__('End date'))
                                    ->after('start_date')
                                    ->required()
                                    ->dehydrateStateUsing(fn ($state, $get) => 
                        Carbon::parse($state)->gt(Carbon::parse($get('start_date'))) 
                            ? $state 
                            : null // Clears invalid date
                    )->helperText(__('End date must be after start date.')),
                            ]),
                                                // Duration Calculation
                            Forms\Components\Placeholder::make('duration')
                            ->label(__('Duration (days)'))
                            ->content(fn ($get) => 
                                $get('start_date') && $get('end_date') 
                                    ? \Carbon\Carbon::parse($get('start_date'))->diffInDays(\Carbon\Carbon::parse($get('end_date'))) . ' days' 
                                    : 'N/A'
                            )
                            ->reactive(),
                            Forms\Components\TextInput::make('project_code')
                            ->label(__('Project code'))
                            ->unique(Project::class, ignoreRecord: true)
                            ->required()
                            ->disabled() // Prevent manual editing
                            ->reactive(), // Ensures real-time updates when project_prefix changes
                        

                        Forms\Components\TextInput::make('budget')
                            ->label(__('Project budget'))
                            ->numeric()
                            ->required(),

                        Forms\Components\Select::make('budget_currency')
                            ->label(__('Budget currency'))
                            ->options([
                                'USD' => 'USD',
                                'EUR' => 'EUR',
                                'KES' => 'KES',
                                'GBP' => 'GBP',
                            ])
                            ->required(),
                            Forms\Components\Select::make('project_donor')
                            ->label(__('Project Donor'))
                            ->options(Donor::pluck('name', 'id')->toArray())
                            ->searchable()
                            ->preload()
                            ->required(),

                        Forms\Components\TextInput::make('other_donors')
                            ->label(__('Other donors'))
                            ->visible(fn ($get) => $get('project_donor') === 'Other'),
                            Forms\Components\Card::make()
                            ->schema([
                        Forms\Components\Repeater::make('outputs')
                            ->relationship('outputs') // Assumes a hasMany() relationship exists in Project model
                            ->label(__('Project Outputs'))
                            ->schema([
                                Forms\Components\TextInput::make('title')
                                        ->label(__('Output Title'))
                                        ->required()
                                        ->maxLength(255),
                        
                                    Forms\Components\RichEditor::make('description')
                                        ->label(__('Output Description'))
                                        ->required(),
                                    ])
                                    ->collapsible()
                                    ->itemLabel(fn(array $state) => $state['title'] ?? 'New Output'),
                            ]),
                        
                    ])
                    ->columns(['default' => 1, 'md' => 2]),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('cover')
                ->label(__('Cover Image'))
                ->formatStateUsing(fn($record) => new HtmlString(
                    '<div style="width: 50px; height: 50px;
                                background-image: url(\'' . $record->cover . '\');
                                background-size: cover; 
                                background-position: center; 
                                border-radius: 8px; 
                                box-shadow: 0 2px 4px rgba(0,0,0,0.1);">
                    </div>'
                )),

                Tables\Columns\TextColumn::make('name')
                    ->label(__('Project name'))
                    ->sortable()
                    ->searchable(),

                Tables\Columns\TextColumn::make('owner.name')
                    ->label(__('Project owner'))
                    ->sortable()
                    ->searchable(),

                Tables\Columns\TextColumn::make('status.name')
                    ->label(__('Project status'))
                    ->formatStateUsing(fn($record) => new HtmlString('
                            <div class="flex items-center gap-2">
                                <span class="filament-tables-color-column relative flex h-6 w-6 rounded-md"
                                    style="background-color: ' . $record->status->color . '"></span>
                                <span>' . $record->status->name . '</span>
                            </div>
                        '))
                    ->sortable()
                    ->searchable(),

                Tables\Columns\TagsColumn::make('users.name')
                    ->label(__('Affected users'))
                    ->limit(2),

                Tables\Columns\TextColumn::make('created_at')
                    ->label(__('Created at'))
                    ->dateTime()
                    ->sortable()
                    ->searchable(),
                    Tables\Columns\TextColumn::make('outputs_count')
                    ->label(__('Outputs'))
                    ->counts('outputs')
                    ->sortable(),
            ])
            ->filters([
                Tables\Filters\SelectFilter::make('owner_id')
                    ->label(__('Owner'))
                    ->multiple()
                    ->options(fn() => User::all()->pluck('name', 'id')->toArray()),

                Tables\Filters\SelectFilter::make('status_id')
                    ->label(__('Status'))
                    ->multiple()
                    ->options(fn() => ProjectStatus::all()->pluck('name', 'id')->toArray()),
            ])
            ->actions([
                Tables\Actions\Action::make('favorite')
                    ->label('')
                    ->icon('heroicon-o-star')
                    ->color(fn($record) => auth()->user()->favoriteProjects()
                        ->where('projects.id', $record->id)->count() ? 'success' : 'default')
                    ->action(function ($record) {
                        $projectId = $record->id;
                        $projectFavorite = ProjectFavorite::where('project_id', $projectId)
                            ->where('user_id', auth()->user()->id)
                            ->first();
                        if ($projectFavorite) {
                            $projectFavorite->delete();
                        } else {
                            ProjectFavorite::create([
                                'project_id' => $projectId,
                                'user_id' => auth()->user()->id
                            ]);
                        }
                        Filament::notify('success', __('Project updated'));
                    }),

                Tables\Actions\ViewAction::make(),
                Tables\Actions\EditAction::make(),

            ])
            ->bulkActions([
                Tables\Actions\DeleteBulkAction::make(),            
            ]);
    }

    public static function getRelations(): array
    {
        return [
            RelationManagers\UsersRelationManager::class,
            RelationManagers\StatusesRelationManager::class,
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListProjects::route('/'),
            'create' => Pages\CreateProject::route('/create'),
            'view' => Pages\ViewProject::route('/{record}/view'),
            'edit' => Pages\EditProject::route('/{record}/edit'),
            'projectdetails' => Pages\ProjectDetails::route('/{record}/projectdetails'),
        ];
    }
}
