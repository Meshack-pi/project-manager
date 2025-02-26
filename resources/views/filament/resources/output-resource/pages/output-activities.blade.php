<x-filament::page>
    <div class="space-y-6">
        {{-- Activities List --}}
        <div class="bg-white rounded-lg shadow p-6">
            <h2 class="text-xl font-bold mb-4">Activities</h2>
            <ul class="space-y-4">
                @foreach($record->activities as $activity)
                    <li class="border-b pb-4">
                        <h3 class="text-lg font-medium">{{ $activity->title }}</h3>
                        <p class="text-gray-600">{{ $activity->description }}</p>
                    </li>
                @endforeach
            </ul>
            <a href="{{ route('filament.resources.outputs.activities.create', $record) }}" class="mt-4 inline-block bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600">
                Add Activity
            </a>
        </div>
    </div>
</x-filament::page>