<x-card class="mb-4">
    <div class="flex justify-between">  
            <h2 class="text-lg font-medium">{{ $job->title }}</h2>
            <div class="text-slate-500">${{ number_format($job->salary) }}</div> 
    </div>

    <div class="mb-4 flex justify-between items-center text-sm text-slate-400 items-center">
        <div class="flex space-x-4">
            <div>Company name</div>
            <div>{{ $job->location }}</div>
        </div>
        <div class="flex space-x-1 text-xs">
            <x-tag>{{ Str::ucfirst($job->experience) }}</x-tag>
            <x-tag>{{ $job->category }}</x-tag>
        </div>
    </div>

    <div class="mt-3">
        {{ $slot }}
    </div>
</x-card>