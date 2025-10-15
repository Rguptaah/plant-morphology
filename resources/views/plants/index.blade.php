<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Plants') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    @if(auth()->user()->hasRole('botanist'))
                        <div class="mb-4">
                            <a href="{{ route('plants.create') }}" class="inline-flex items-center px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 focus:bg-gray-700 active:bg-gray-900 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 transition ease-in-out duration-150">
                                Add New Plant
                            </a>
                        </div>
                    @endif

                    @if($plants->isEmpty())
                        <p>No plants found.</p>
                    @else
                        <div class="overflow-x-auto">
                            <table class="min-w-full divide-y divide-gray-200">
                                <thead class="bg-gray-50">
                                    <tr>
                                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Name</th>
                                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Created By</th>
                                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Approved By</th>
                                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Actions</th>
                                    </tr>
                                </thead>
                                <tbody class="bg-white divide-y divide-gray-200">
                                    @foreach($plants as $plant)
                                        <tr>
                                            <td class="px-6 py-4 whitespace-nowrap">{{ $plant->plant_name }}</td>
                                            <td class="px-6 py-4 whitespace-nowrap">{{ $plant->creator->name ?? 'Unknown' }}</td>
                                            <td class="px-6 py-4 whitespace-nowrap">{{ $plant->approver->name ?? 'Pending' }}</td>
                                            <td class="px-6 py-4 whitespace-nowrap text-sm font-medium">
                                                <a href="{{ route('plants.show', $plant) }}" class="text-indigo-600 hover:text-indigo-900 mr-3">View</a>
                                                
                                                @if(auth()->user()->hasRole('botanist') && $plant->created_by == auth()->id())
                                                    <a href="{{ route('plants.edit', $plant) }}" class="text-yellow-600 hover:text-yellow-900 mr-3">Edit</a>
                                                @endif
                                                
                                                @if(auth()->user()->hasRole('administrator'))
                                                    <form method="POST" action="{{ route('plants.destroy', $plant) }}" class="inline">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit" class="text-red-600 hover:text-red-900" onclick="return confirm('Are you sure you want to delete this plant?')">Delete</button>
                                                    </form>
                                                @endif
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                        
                        <div class="mt-4">
                            {{ $plants->links() }}
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</x-app-layout>