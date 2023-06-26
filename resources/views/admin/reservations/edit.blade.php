<x-admin-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
          <x-session />
          <div class="space-y-8 divide-y divide-gray-200 w-1/2 mt-10">
                <form action="{{ route('reservations.update', $reservation->id) }}" method="POST" enctype="multipart/form-data">
                  @csrf
                  @method('PATCH')
                  <div class="sm:col-span-6">
                    <label for="first_name" class="block text-sm font-medium text-gray-700">First name</label>
                    <div class="mt-1">
                      <input type="text" id="first_name" wire:model.lazy="first_name" name="first_name" class="block w-full appearance-none bg-white border border-gray-400 rounded-md py-2 px-3 text-base leading-normal transition duration-150 ease-in-out sm:text-sm sm:leading-5  @error('first_name') border-red-500 @enderror" value="{{ $reservation->first_name }}" />
                    </div>
                    @error('first_name')
                    <x-error-message :message="$message" />
                @enderror
                  </div>
                    <div class="sm:col-span-6">
                    <label for="last_name" class="block text-sm font-medium text-gray-700">Last name</label>
                    <div class="mt-1">
                      <input type="text" id="last_name" wire:model.lazy="last_name" name="last_name" class="block w-full appearance-none bg-white border border-gray-400 rounded-md py-2 px-3 text-base leading-normal transition duration-150 ease-in-out sm:text-sm sm:leading-5 @error('last_name') border-red-500 @enderror" value="{{ $reservation->last_name }}" />
                    </div>
                    @error('last_name')
                    <x-error-message :message="$message" />
                @enderror
                  </div>
                    <div class="sm:col-span-6">
                    <label for="email" class="block text-sm font-medium text-gray-700">Email</label>
                    <div class="mt-1">
                      <input type="text" id="email" wire:model.lazy="email" name="email" class="block w-full appearance-none bg-white border border-gray-400 rounded-md py-2 px-3 text-base leading-normal transition duration-150 ease-in-out sm:text-sm sm:leading-5 @error('email') border-red-500 @enderror" value="{{ $reservation->email }}" />
                    </div>
                    @error('email')
                    <x-error-message :message="$message" />
                @enderror
                  </div>
                    <div class="sm:col-span-6">
                    <label for="tel_number" class="block text-sm font-medium text-gray-700">Tel. number</label>
                    <div class="mt-1">
                      <input type="text" id="tel_number" wire:model.lazy="title" name="tel_number" class="block w-full appearance-none bg-white border border-gray-400 rounded-md py-2 px-3 text-base leading-normal transition duration-150 ease-in-out sm:text-sm sm:leading-5 @error('tel_number') border-red-500 @enderror" value="{{ $reservation->tel_number }}"/>
                    </div>
                    @error('tel_number')
                    <x-error-message :message="$message" />
                @enderror
                  </div>
                    <div class="sm:col-span-6">
                    <label for="res_date" class="block text-sm font-medium text-gray-700">Date</label>
                    <div class="mt-1">
                      <input type="datetime-local" id="res_date" wire:model.lazy="res_date" name="res_date" class="block w-full appearance-none bg-white border border-gray-400 rounded-md py-2 px-3 text-base leading-normal transition duration-150 ease-in-out sm:text-sm sm:leading-5 @error('res_date') border-red-500 @enderror" value="{{ $reservation->res_date }}"/>
                    </div>
                    @error('res_date')
                    <x-error-message :message="$message" />
                @enderror
                  </div>
                  <div class="sm:col-span-6">
                    <label for="table_id" class="block text-sm font-medium text-gray-700">Table</label>
                    <div class="mt-1">
                        <select class="block w-full" name="table_id" id="table_id">
                            @foreach ($tables as $table)
                                <option value="{{ $table->id }}" @selected($table->id == $reservation->table_id)>{{ $table->location }} for {{ $table->guest_number }} pers.</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                  <div class="sm:col-span-6">
                    <label for="guests" class="block text-sm font-medium text-gray-700">Guest number</label>
                    <div class="mt-1">
                      <span class="text-red-500">Currently reserved for  {{ $reservation->guest_number }} Persons</span>
                        <select class="block w-full" name="guest_number" id="guest_number" >
                            @for ($i = 1; $i <= 10; $i++)
                                <option value="{{ $i }}">{{ $i }}</option>
                            @endfor
                        </select>
                    </div>
                </div>
                  <button class="px-4 py-2 mt-5 bg-indigo-500 hover:bg-indigo-700 rounded-lg text-white">Save</button>
                </form>
              </div>  
        </div>
    </div>
</x-admin-layout>
