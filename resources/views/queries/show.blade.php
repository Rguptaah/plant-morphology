<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Query Details') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <div class="mb-6">
                        <a href="{{ route('queries.index') }}" class="text-indigo-600 hover:text-indigo-900">
                            &larr; Back to Queries
                        </a>
                    </div>

                    <div class="mb-6">
                        <h3 class="text-lg font-medium text-gray-900 mb-2">{{ $query->subject }}</h3>
                        
                        <div class="flex items-center mb-4">
                            <span class="px-2 py-1 text-xs font-semibold rounded-full 
                                @if($query->status == 'pending') bg-yellow-100 text-yellow-800 
                                @elseif($query->status == 'assigned') bg-blue-100 text-blue-800 
                                @elseif($query->status == 'resolved') bg-green-100 text-green-800 
                                @endif mr-2">
                                {{ ucfirst($query->status) }}
                            </span>
                            <span class="text-sm text-gray-500">Submitted by {{ $query->user->name }} on {{ $query->created_at->format('M d, Y') }}</span>
                        </div>

                        <div class="bg-gray-50 p-4 rounded-lg mb-6">
                            <p class="whitespace-pre-line">{{ $query->description }}</p>
                        </div>

                        @if($query->assigned_to)
                            <div class="mb-4">
                                <h4 class="text-sm font-medium text-gray-700">Assigned To:</h4>
                                <p>{{ $query->assignedUser->name }}</p>
                            </div>
                        @endif

                        @if($query->status == 'resolved' && $query->resolution)
                            <div class="mt-6">
                                <h4 class="text-sm font-medium text-gray-700 mb-2">Resolution:</h4>
                                <div class="bg-gray-50 p-4 rounded-lg">
                                    <p class="whitespace-pre-line">{{ $query->resolution }}</p>
                                    <p class="text-sm text-gray-500 mt-2">Resolved on {{ $query->resolved_at->format('M d, Y') }}</p>
                                </div>
                            </div>
                        @endif

                        <div class="mt-8">
                            @if(auth()->user()->hasRole('administrator') && $query->status == 'pending')
                                <a href="{{ route('queries.assign', $query) }}" class="inline-flex items-center px-4 py-2 bg-blue-600 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-blue-700 mr-2">
                                    Assign Query
                                </a>
                            @endif

                            @if(auth()->user()->id == $query->assigned_to && $query->status == 'assigned')
                                <a href="{{ route('queries.resolve', $query) }}" class="inline-flex items-center px-4 py-2 bg-green-600 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-green-700">
                                    Resolve Query
                                </a>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>