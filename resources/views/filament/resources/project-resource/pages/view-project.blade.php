<x-filament::page>
    <div class="max-w-5xl mx-auto space-y-8">
        {{-- Back Button --}}
        <div>
            <a href="{{ route('filament.resources.projects.index') }}" 
                class="inline-flex items-center px-4 py-2 bg-blue-600 text-white rounded-lg shadow hover:bg-blue-700 transition">
                <x-heroicon-o-arrow-left class="w-5 h-5 mr-2" /> Back to Projects
            </a>
        </div>

        {{-- Project Details Card --}}
        <div class="bg-white border border-gray-200 rounded-lg shadow-lg p-6">
            <h2 class="text-xl font-bold mb-4 flex items-center text-gray-800">
                <x-heroicon-o-document-text class="w-6 h-6 mr-2 text-blue-600" /> Project Details
            </h2>
            <div class="space-y-4 text-gray-800">
                <p><strong>Name:</strong> {{ $record->name }}</p>
                <p><strong>Budget:</strong> {{ $record->budget }} {{ $record->budget_currency }}</p>
                <p><strong>Start Date:</strong> {{ $record->start_date->format('Y-m-d') }}</p>
                <p><strong>End Date:</strong> {{ $record->end_date->format('Y-m-d') }}</p>
                
                {{-- Render HTML content properly --}}
                <div class="prose max-w-none">
                    <strong>Description:</strong> {!! $record->description !!}
                </div>
            </div>
        </div>

        {{-- Outputs Card --}}
        <div class="bg-white border border-gray-200 rounded-lg shadow-lg p-6">
            <h2 class="text-xl font-bold mb-4 flex items-center text-gray-800">
                <x-heroicon-o-chart-bar class="w-6 h-6 mr-2 text-blue-600" /> Outputs
            </h2>
            <ul class="divide-y divide-gray-300">
                @forelse($record->outputs as $output)
                    <li class="py-4">
                        <h3 class="text-lg font-medium text-gray-900">{{ $output->title }}</h3>
                        <p class="text-gray-600">{{ $output->description }}</p>
                    </li>
                @empty
                    <li class="text-gray-500 text-center py-4">No outputs available.</li>
                @endforelse
            </ul>
        </div>
    </div>
</x-filament::page>
