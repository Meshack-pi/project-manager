<x-filament::page>
    <div class="p-6 bg-white rounded-lg shadow">
        <h2 class="text-2xl font-semibold">{{ $record->name }}</h2>
        <p class="text-gray-600">Project Code: <strong>{{ $record->project_code }}</strong></p>
        <p class="text-gray-600">Ticket Prefix: <strong>{{ $record->ticket_prefix }}</strong></p>
        <p class="text-gray-600">HRP Project: <strong>{{ $record->is_hrp_project ? 'Yes' : 'No' }}</strong></p>
        <p class="text-gray-600">HRP Code: <strong>{{ $record->hrp_code }}</strong></p>

        <div class="mt-4">
            <a href="{{ $record->type === 'scrum' ? route('filament.pages.scrum/{project}', ['project' => $record->id]) : route('filament.pages.kanban/{project}', ['project' => $record->id]) }}" 
               class="px-4 py-2 bg-blue-500 text-white rounded">
                {{ $record->type === 'scrum' ? 'Go to Scrum Board' : 'Go to Kanban Board' }}
            </a>
        </div>
    </div>
</x-filament::page>
