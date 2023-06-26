<x-admin-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="space-y-8 divide-y divide-gray-200 w-1/2 mt-10">
                <form action="{{ route('tables.update', $table->id) }}" method="POST" enctype="multipart/form-data">
                  @csrf
                  @method('PATCH')
                    <div class="sm:col-span-6">
                    <label for="number" class="block text-sm font-medium text-gray-700">Number</label>
                    <div class="mt-1">
                      <input type="text" id="number" wire:model.lazy="number" name="number" value="{{ $table->number }}" class="block w-full appearance-none bg-white border border-gray-400 rounded-md py-2 px-3 text-base leading-normal   sm:text-sm sm:leading-5 @error('number') border-red-500 @enderror" />
                    </div>
                    @error('number')
                            <x-error-message :message="$message" />
                        @enderror
                  </div>
                    <div class="sm:col-span-6">
                    <label for="guest_number" class="block text-sm font-medium text-gray-700">Guest Number</label>
                    <div class="mt-1">
                      <input type="text" id="guest_number" name="guest_number" value="{{ $table->guest_number }}" class="block w-full appearance-none bg-white border border-gray-400 rounded-md py-2 px-3 text-base leading-normal   sm:text-sm sm:leading-5" />
                    </div>
                  </div>
                    <div class="sm:col-span-6">
                    <label for="status" class="block text-sm font-medium text-gray-700">Status</label>
                    <div class="mt-1">
                      <select class="block w-full" name="status" id="status">
                        @foreach (App\Enums\TableStatus::cases() as $status)
                            <option value="{{ $status->value }}" @selected($table->status == $status->value )>{{ $status->name }}</option>
                        @endforeach
                    </select>
                    </div>
                  </div>
                    <div class="sm:col-span-6">
                    <label for="location" class="block text-sm font-medium text-gray-700">Location</label>
                    <div class="mt-1">
                      <select class="block w-full" name="location" id="location">
                        @foreach (App\Enums\TableLocation::cases() as $location)
                            <option value="{{ $location->value }}" @selected($table->location == $location->value )>{{ $location->name }}</option>
                        @endforeach
                    </select>
                    </div>
                  </div>
                 
                  <button class="px-4 py-2 mt-5 bg-indigo-500 hover:bg-indigo-700 rounded-lg text-white">Save</button>
                </form>
              </div>  
        </div>
    </div>
</x-admin-layout>
