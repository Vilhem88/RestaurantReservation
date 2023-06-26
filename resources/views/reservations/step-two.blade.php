<x-guest-layout>
    <div class="container w-full px-5 py-6 mx-auto">
        <div class="flex-items-center min-h-screen">
            <div class="flex-1 h-full max-w-4xl mx-auto rounded-lg shadow-xl">
                <div class="flex flex-col md:flex-row">
                    <div class="flex items-center justify-center p-6 sm:p-12 w-full">
                        <div class="w-full">
                            <h3 class="mb-4 text-xl text-center font-bold text-blue-600">Make Reservation</h3>
                            <div class="w-full bg-gray-200 rounded-full">
                                <div class="w-100 p-1 text-xs font-medium loading-none text-center text-white bg-blue-600">
                                    Step 2
                                </div>
                            </div>
                            <x-session />
                            <div class="space-y-8 divide-y divide-gray-200 w-full mt-10">
                                <form action="{{ route('frontendReservations.store.stepTwo') }}" method="POST">
                                    @csrf

                                    <div class="sm:col-span-6">
                                        <label for="table_id"
                                            class="block text-sm font-medium text-gray-700">Table</label>
                                        <div class="mt-1">
                                            <select class="block w-full" name="table_id" id="table_id">
                                                @foreach ($tables as $table)
                                                    <option value="{{ $table->id }}" @selected($table->id == $reservation->table_id)>
                                                        {{ $table->location }} for {{ $table->guest_number }} pers.
                                                    </option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="flex justify-between">
                                        <a href="{{ route('frontendReservations.stepOne') }}"  class="px-4 py-2 mt-5 bg-indigo-500 hover:bg-indigo-700 rounded-lg text-white">Previous</a>
                                        <button
                                        class="px-4 py-2 mt-5 bg-indigo-500 hover:bg-indigo-700 rounded-lg text-white">Submit</button>
                                    </div>
                                </form>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
</x-guest-layout>
