<x-admin-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="space-y-8 divide-y divide-gray-200 w-1/2 mt-10">
                <form action="{{ route('categories.update', $category->id) }}" method="POST" enctype="multipart/form-data">
                  @csrf
                  @method('PATCH')
                    <div class="sm:col-span-6">
                    <label for="name" class="block text-sm font-medium text-gray-700">Name</label>
                    <div class="mt-1">
                      <input type="text" id="name" wire:model.lazy="title" name="name" value="{{ $category->name }}" class="block w-full appearance-none bg-white border border-gray-400 rounded-md py-2 px-3 text-base leading-normal   sm:text-sm sm:leading-5 @error('name') border-red-500 @enderror" value="{{ old($category->name) }}"/>
                    </div>
                    @error('name')
                    <x-error-message :message="$message"/>
                    @enderror
                  <div class="sm:col-span-6">
                    <label for="title" class="block text-sm font-medium text-gray-700">Image</label>
                    <div class="mt-1">
                      <input type="file" id="image" wire:model="newImage" name="image" class="block w-full appearance-none bg-white border border-gray-400 rounded-md py-2 px-3 text-base leading-normal   sm:text-sm sm:leading-5 @error('image') border-red-500 @enderror"/>
                    </div>
                    @error('image')
                    <x-error-message :message="$message"/>
                    @enderror
                      <img src="{{ Storage::url($category->image_path) }}" class="w-32 h-32 mt-2" alt="">
                  </div>
                  <div class="sm:col-span-6 pt-5">
                    <label for="description" class="block text-sm font-medium text-gray-700">Description</label>
                    <div class="mt-1">
                      <textarea id="description" name="description" rows="3" wire:model.lazy="description" class="shadow-sm focus:ring-indigo-500 appearance-none bg-white border py-2 px-3 text-base leading-normal   focus:border-indigo-500 block w-full sm:text-sm border-gray-300 rounded-md  @error('description') border-red-500 @enderror">{{ $category->description }}</textarea>
                    </div>
                    @error('description')
                    <x-error-message :message="$message"/>
                    @enderror
                  </div>
                  <button class="px-4 py-2 mt-5 bg-indigo-500 hover:bg-indigo-700 rounded-lg text-white">Save</button>
                </form>
              </div>  
        </div>
    </div>
</x-admin-layout>
