<x-admin-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="space-y-8 divide-y divide-gray-200 w-1/2 mt-10">
                <form action="{{ route('menus.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="sm:col-span-6">
                        <label for="name" class="block text-sm font-medium text-gray-700">Name</label>
                        <div class="mt-1">
                            <input type="text" id="name" wire:model.lazy="title" name="name"
                                class="block w-full   appearance-none bg-white border   py-2 px-3 text-base leading-normal   sm:text-sm sm:leading-5 @error('name') border-red-500 @enderror" value="{{ old('name') }}"/>
                            </div>
                            @error('name')
                          <x-error-message :message="$message"/>
                            @enderror
                    <div class="sm:col-span-6">
                        <label for="price" class="block text-sm font-medium text-gray-700">Price</label>
                        <div class="mt-1">
                            <input type="number" id="price" wire:model.lazy="title" name="price"
                                class="block w-full   appearance-none bg-white border   py-2 px-3 text-base leading-normal   sm:text-sm sm:leading-5 @error('price') border-red-500 @enderror" value="{{ old('price') }}"/>
                            </div>
                            @error('price')
                            <x-error-message :message="$message"/>
                            @enderror
                    <div class="sm:col-span-6">
                        <label for="name" class="block text-sm font-medium text-gray-700">Categories</label>
                        <div class="mt-1">
                            <select multiple="multiple" class="block w-full form-control form-multiselect" name="categories[]" id="categories" placeholder="select a category">
                                <option value="none" selected disabled hidden>Select a category</option>
                                @foreach ($categories as $category)
                                    <option value="{{ $category->id }}">{{ $category->name }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="sm:col-span-6">
                        <label for="title" class="block text-sm font-medium text-gray-700">Image</label>
                        <div class="mt-1">
                            <input type="file" id="image" wire:model="newImage" name="image"
                                class="block w-full   appearance-none bg-white border   py-2 px-3 text-base leading-normal   sm:text-sm sm:leading-5 @error('image') border-red-500 @enderror"/>
                            </div>
                            @error('image')
                            <x-error-message :message="$message"/>
                            @enderror
                    <div class="sm:col-span-6 pt-5">
                        <label for="description" class="block text-sm font-medium text-gray-700">Description</label>
                        <div class="mt-1">
                            <textarea id="description" name="description" rows="3" wire:model.lazy="description"
                                class="shadow-sm focus:ring-indigo-500 appearance-none bg-white border   py-2 px-3 text-base leading-normal   focus:border-indigo-500 block w-full sm:text-sm border-gray-300 rounded-md  @error('description') border-red-500 @enderror">{{ old('description') }}</textarea>
                        </div>
                        @error('description')
                        <x-error-message :message="$message"/>
                        @enderror
                    </div>
                    <button
                        class="px-4 py-2 mt-5 bg-indigo-500 hover:bg-indigo-700 rounded-lg text-white">Submit</button>
                </form>
            </div>
        </div>
    </div>
</x-admin-layout>
