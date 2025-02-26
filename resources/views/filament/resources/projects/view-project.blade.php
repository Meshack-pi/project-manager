<x-filament::page>
    <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
        {{-- Project Details --}}
        <div class="flex flex-col items-center bg-white shadow-md rounded-lg p-4">
            <img src="{{ asset('img/humanitarian-aid-benefits.jpg') }}" alt="Project Details" class="w-full h-auto rounded-md">
            <a href="{{ route('filament.resources.projects.view', $record->id) }}" 
               class="mt-3 w-full text-center bg-primary-700 text-white py-2 rounded hover:bg-primary-600">
                Go to Project Details
            </a>
        </div>
        {{-- Outputs & Activities --}}
        <div class="flex flex-col items-center bg-white shadow-md rounded-lg p-4">
            <img src="{{ asset('img/un-aid.jpg') }}" alt="Outputs & Activities" class="w-full h-auto rounded-md">
            <a href="{{ url('/outputs-activities') }}" 
               class="mt-3 w-full text-center bg-primary-700 text-white py-2 rounded hover:bg-primary-600">
                Go to Outputs & Activities
            </a>
        </div>

        {{-- Financial Reports --}}
        <div class="flex flex-col items-center bg-white shadow-md rounded-lg p-4">
            <img src="{{ asset('img/reports.jpg') }}" alt="Financial Reports" class="w-full h-auto rounded-md">
            <a href="{{ url('/financial-reports') }}" 
               class="mt-3 w-full text-center bg-primary-700 text-white py-2 rounded hover:bg-primary-600">
                Go to Financial Reports
            </a>
        </div>
    </div>
</x-filament::page>
