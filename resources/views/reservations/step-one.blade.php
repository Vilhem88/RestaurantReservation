<x-guest-layout>
    <div class="container w-full px-5 py-6 mx-auto">
        <div class="flex-items-center min-h-screen">
            <div class="flex-1 h-full max-w-4xl mx-auto rounded-lg shadow-xl">
                <div class="flex flex-col md:flex-row">
                    <div class="flex items-center justify-center p-6 sm:p-12 w-full">
                        <div class="w-full">
                            <h3 class="mb-4 text-xl text-center font-bold text-blue-600">Make Reservation</h3>
                                <div class="p-1 text-xs font-medium loading-none text-center text-white rounded-lg bg-blue-600">
                                    Step 1
                                </div>
                            <x-session />
                           
                                <form action="{{ route('frontendReservations.store.stepOne') }}" method="POST">
                                    @csrf
                                    <div class="sm:col-span-6">
                                        <label for="first_name" class="block text-sm font-medium text-gray-700">First
                                            name</label>
                                        <div class="mt-1">
                                            <input type="text" id="first_name" wire:model.lazy="first_name"
                                                name="first_name"
                                                class="block w-full appearance-none bg-white border border-gray-400 rounded-md py-2 px-3 text-base leading-normal transition duration-150 ease-in-out sm:text-sm sm:leading-5  @error('first_name') border-red-500 @enderror"
                                                value="{{ $reservation->first_name ?? ''}}" />
                                        </div>
                                        @error('first_name')
                                            <x-error-message :message="$message" />
                                        @enderror
                                    </div>
                                    <div class="sm:col-span-6">
                                        <label for="last_name" class="block text-sm font-medium text-gray-700">Last
                                            name</label>
                                        <div class="mt-1">
                                            <input type="text" id="last_name" wire:model.lazy="last_name"
                                                name="last_name"
                                                class="block w-full appearance-none bg-white border border-gray-400 rounded-md py-2 px-3 text-base leading-normal transition duration-150 ease-in-out sm:text-sm sm:leading-5 @error('last_name') border-red-500 @enderror"
                                                value="{{ $reservation->last_name ?? '' }}" />
                                        </div>
                                        @error('last_name')
                                            <x-error-message :message="$message" />
                                        @enderror
                                    </div>
                                    <div class="sm:col-span-6">
                                        <label for="email"
                                            class="block text-sm font-medium text-gray-700">Email</label>
                                        <div class="mt-1">
                                            <input type="text" id="email" wire:model.lazy="email"
                                                name="email"
                                                class="block w-full appearance-none bg-white border border-gray-400 rounded-md py-2 px-3 text-base leading-normal transition duration-150 ease-in-out sm:text-sm sm:leading-5 @error('email') border-red-500 @enderror"
                                                value="{{ $reservation->email ?? '' }}" />
                                        </div>
                                        @error('email')
                                            <x-error-message :message="$message" />
                                        @enderror
                                    </div>
                                    <div class="sm:col-span-6">
                                        <label for="tel_number" class="block text-sm font-medium text-gray-700">Tel.
                                            number</label>
                                        <div class="mt-1">
                                            <input type="text" id="tel_number" wire:model.lazy="title"
                                                name="tel_number"
                                                class="block w-full appearance-none bg-white border border-gray-400 rounded-md py-2 px-3 text-base leading-normal transition duration-150 ease-in-out sm:text-sm sm:leading-5 @error('tel_number') border-red-500 @enderror"
                                                value="{{ $reservation->tel_number ?? '' }}" />
                                        </div>
                                        @error('tel_number')
                                            <x-error-message :message="$message" />
                                        @enderror
                                    </div>
                                    <div class="sm:col-span-6">
                                        <label for="res_date"
                                            class="block text-sm font-medium text-gray-700">Date</label>
                                        <div class="mt-1">
                                            <input type="datetime-local" id="res_date" wire:model.lazy="res_date"
                                                name="res_date"
                                                min="{{ $min_date }}" 
                                                max="{{ $max_date }}"
                                                class="block w-full appearance-none bg-white border border-gray-400 rounded-md py-2 px-3 text-base leading-normal transition duration-150 ease-in-out sm:text-sm sm:leading-5 @error('res_date') border-red-500 @enderror"
                                                value="{{ $reservation ? $reservation->res_date : '' }}" />
                                        </div>
                                        @error('res_date')
                                            <x-error-message :message="$message" />
                                        @enderror
                                    </div>
                                    <div class="sm:col-span-6">
                                        <label for="guests" class="block text-sm font-medium text-gray-700">Guest
                                            number</label>
                                        <div class="mt-1">
                                            <select class="block w-full" name="guest_number" id="guest_number">
                                                @for ($i = 1; $i <= 10; $i++)
                                                    <option value="{{ $i }}">{{ $i }}</option>
                                                @endfor
                                            </select>
                                        </div>
                                    </div>
                                    <button
                                        class="flex justify-end px-4 py-2 mt-5 bg-indigo-500 hover:bg-indigo-700 rounded-lg text-white">Next</button>
                                </form>
                            
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
</x-guest-layout>
