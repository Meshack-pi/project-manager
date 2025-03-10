<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View Project</title>
    <!-- Include Tailwind CSS -->
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>
<body class="bg-gray-100">
    <div class="container mx-auto p-6">
        <div class="bg-white rounded-lg shadow p-6">
            {{-- Edit Button --}}
            <div class="flex justify-end mb-6">
                <a href="#" class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600">
                    Edit Project
                </a>
            </div>

            {{-- Project Details --}}
            <h1 class="text-2xl font-bold mb-4">Project Details</h1>
            <div class="space-y-4">
                <p><strong>Name:</strong> {{ $project->name }}</p>
                <p><strong>Budget:</strong> {{ $project->budget }} {{ $project->budget_currency }}</p>
                <p><strong>Start Date:</strong> {{ $project->start_date->format('Y-m-d') }}</p>
                <p><strong>End Date:</strong> {{ $project->end_date->format('Y-m-d') }}</p>
                <p><strong>Description:</strong> {{ $project->description }}</p>
            </div>

            {{-- Outputs --}}
            <h2 class="text-xl font-bold mt-6 mb-4">Outputs</h2>
            <ul class="space-y-4">
                @foreach($project->outputs as $output)
                    <li class="border-b pb-4">
                        <h3 class="text-lg font-medium">{{ $output->title }}</h3>
                        <p class="text-gray-600">{{ $output->description }}</p>
                    </li>
                @endforeach
            </ul>
        </div>
    </div>
</body>
</html>