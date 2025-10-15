<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Add New Plant') }}
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

                    <form method="POST" action="{{ route('plants.store') }}">
                        @csrf

                        <div class="mb-6">
                            <label for="plant_name" class="block text-sm font-medium text-gray-700">Plant Name</label>
                            <input type="text" name="plant_name" id="plant_name" value="{{ old('plant_name') }}" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500" required>
                            @error('plant_name')
                                <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="mb-6">
                            <label class="block text-sm font-medium text-gray-700 mb-2">Habitats</label>
                            <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
                                @foreach($habitats as $habitat)
                                    <div class="flex items-center">
                                        <input type="checkbox" name="habitats[]" id="habitat_{{ $habitat->id }}" value="{{ $habitat->id }}" class="rounded border-gray-300 text-indigo-600 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50" {{ in_array($habitat->id, old('habitats', [])) ? 'checked' : '' }}>
                                        <label for="habitat_{{ $habitat->id }}" class="ml-2 text-sm text-gray-600">{{ $habitat->name }}</label>
                                    </div>
                                @endforeach
                            </div>
                            @error('habitats')
                                <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="mb-6">
                            <label class="block text-sm font-medium text-gray-700 mb-2">Leaf Types</label>
                            <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
                                @foreach($leaves as $leaf)
                                    <div class="flex items-center">
                                        <input type="checkbox" name="leaves[]" id="leaf_{{ $leaf->id }}" value="{{ $leaf->id }}" class="rounded border-gray-300 text-indigo-600 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50" {{ in_array($leaf->id, old('leaves', [])) ? 'checked' : '' }}>
                                        <label for="leaf_{{ $leaf->id }}" class="ml-2 text-sm text-gray-600">{{ $leaf->name }}</label>
                                    </div>
                                @endforeach
                            </div>
                            @error('leaves')
                                <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="mb-6">
                            <label class="block text-sm font-medium text-gray-700 mb-2">Flower Types</label>
                            <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
                                @foreach($flowers as $flower)
                                    <div class="flex items-center">
                                        <input type="checkbox" name="flowers[]" id="flower_{{ $flower->id }}" value="{{ $flower->id }}" class="rounded border-gray-300 text-indigo-600 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50" {{ in_array($flower->id, old('flowers', [])) ? 'checked' : '' }}>
                                        <label for="flower_{{ $flower->id }}" class="ml-2 text-sm text-gray-600">{{ $flower->name }}</label>
                                    </div>
                                @endforeach
                            </div>
                            @error('flowers')
                                <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                            @enderror
                        </div>

                        <div>
                            <button type="submit" class="inline-flex items-center px-4 py-2 bg-indigo-600 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-indigo-700 focus:bg-indigo-700 active:bg-indigo-900 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 transition ease-in-out duration-150">
                                Submit Plant
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>