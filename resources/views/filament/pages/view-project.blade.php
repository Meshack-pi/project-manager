<x-filament::page>
    <div class="p-6 bg-white shadow rounded-lg">
        <h1 class="text-2xl font-bold">{{ $project->title }}</h1>
        <p class="text-gray-600 mt-2">{{ $project->description }}</p>

        <div class="mt-4">
            <a href="{{ route('filament.admin.resources.projects.edit', $project) }}" 
               class="px-4 py-2 bg-blue-500 text-white rounded">
                Edit Project
            </a>
        </div>
    </div>
</x-filament::page>
