<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ $plant->plant_name }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <div class="mb-6">
                        <a href="{{ route('plants.index') }}" class="text-indigo-600 hover:text-indigo-900">
                            &larr; Back to Plants
                        </a>
                    </div>

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <div>
                            <h3 class="text-lg font-medium text-gray-900 mb-2">Plant Details</h3>
                            <div class="bg-gray-50 p-4 rounded-lg">
                                <p><strong>Name:</strong> {{ $plant->plant_name }}</p>
                                <p><strong>Status:</strong> {{ ucfirst($plant->status) }}</p>
                                <p><strong>Created By:</strong> {{ $plant->creator->name ?? 'Unknown' }}</p>
                                <p><strong>Approved By:</strong> {{ $plant->approver->name ?? 'Pending' }}</p>
                                @if($plant->status === 'rejected')
                                    <p class="text-red-600"><strong>Rejection Reason:</strong> {{ $plant->rejection_reason }}</p>
                                @endif
                            </div>
                        </div>

                        <div>
                            <h3 class="text-lg font-medium text-gray-900 mb-2">Characteristics</h3>
                            <div class="bg-gray-50 p-4 rounded-lg">
                                <div class="mb-4">
                                    <h4 class="font-medium">Habitats:</h4>
                                    @if($plant->habitats->isEmpty())
                                        <p class="text-gray-500">No habitats specified</p>
                                    @else
                                        <ul class="list-disc list-inside">
                                            @foreach($plant->habitats as $habitat)
                                                <li>{{ $habitat->name }}</li>
                                            @endforeach
                                        </ul>
                                    @endif
                                </div>

                                <div class="mb-4">
                                    <h4 class="font-medium">Leaves:</h4>
                                    @if($plant->leaves->isEmpty())
                                        <p class="text-gray-500">No leaf types specified</p>
                                    @else
                                        <ul class="list-disc list-inside">
                                            @foreach($plant->leaves as $leaf)
                                                <li>{{ $leaf->name }}</li>
                                            @endforeach
                                        </ul>
                                    @endif
                                </div>

                                <div>
                                    <h4 class="font-medium">Flowers:</h4>
                                    @if($plant->flowers->isEmpty())
                                        <p class="text-gray-500">No flower types specified</p>
                                    @else
                                        <ul class="list-disc list-inside">
                                            @foreach($plant->flowers as $flower)
                                                <li>{{ $flower->name }}</li>
                                            @endforeach
                                        </ul>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>

                    @if(auth()->user()->hasRole('botanist') && $plant->created_by == auth()->id())
                        <div class="mt-6">
                            <a href="{{ route('plants.edit', $plant) }}" class="inline-flex items-center px-4 py-2 bg-yellow-500 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-yellow-600 focus:bg-yellow-600 active:bg-yellow-700 focus:outline-none focus:ring-2 focus:ring-yellow-500 focus:ring-offset-2 transition ease-in-out duration-150">
                                Edit Plant
                            </a>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</x-app-layout>