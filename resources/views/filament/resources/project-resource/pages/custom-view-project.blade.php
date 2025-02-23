<x-filament::page>
    <div class="space-y-6">
        {{-- Header Section --}}
        <div class="flex items-center gap-4">
            <div class="w-24 h-24 rounded-lg overflow-hidden shadow-lg">
                <img 
                    src="{{ $record->cover }}" 
                    alt="Project cover" 
                    class="w-full h-full object-cover"
                >
            </div>
            <div>
                <h1 class="text-2xl font-bold">{{ $record->name }}</h1>
                <p class="text-gray-600">{{ $record->description }}</p>
            </div>
        </div>

        {{-- Stats Grid --}}
        <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
            <div class="bg-white rounded-lg shadow p-4">
                <dt class="text-sm font-medium text-gray-500">Budget</dt>
                <dd class="mt-1 text-2xl font-semibold">
                    {{ $record->budget }} {{ $record->budget_currency }}
                </dd>
            </div>

            <div class="bg-white rounded-lg shadow p-4">
                <dt class="text-sm font-medium text-gray-500">Status</dt>
                <dd class="mt-1 text-2xl font-semibold flex items-center gap-2">
                    <span 
                        class="w-3 h-3 rounded-full" 
                        style="background-color: {{ $record->status->color }}"
                    ></span>
                    {{ $record->status->name }}
                </dd>
            </div>

            {{-- Duration Section --}}
<div class="bg-white rounded-lg shadow p-4">
    <dt class="text-sm font-medium text-gray-500">Duration</dt>
    <dd class="mt-1 text-2xl font-semibold">
        @if ($record->start_date && $record->end_date)
            {{ $record->start_date->diffInDays($record->end_date) }} days
        @else
            N/A
        @endif
    </dd>
</div>
        </div>

        {{-- Outputs Section --}}
        <div class="bg-white rounded-lg shadow">
            <div class="px-4 py-5 sm:px-6 border-b">
                <h3 class="text-lg font-medium leading-6 text-gray-900">Project Outputs</h3>
            </div>
            <div class="px-4 py-5 sm:p-6">
                @foreach($record->outputs as $output)
                    <div class="border-b pb-4 mb-4">
                        <h3 class="font-medium">{{ $output->title }}</h3>
                        <p class="text-gray-600">{{ $output->description }}</p>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
</x-filament::page>