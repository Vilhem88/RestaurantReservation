<x-admin-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <x-session/>
            <div class="flex justify-end m-2 p-2">
                <a href="{{ route('menus.create') }}"
                    class="px-4 py-2 bg-indigo-500 hover:bg-indigo-700 rounded-lg text-white">New Menu</a>
            </div>
            <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
                <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                    <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                        <tr>
                            <th scope="col" class="px-6 py-3">
                                Name
                            </th>
                            <th scope="col" class="px-6 py-3">
                                price
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Image
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Description
                            </th>
                            <th scope="col" class="px-6 py-3"></th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($menus as $menu)
                            <tr class="bg-white border-b dark:bg-gray-900 dark:border-gray-700">
                                <td class="px-6 py-4">
                                    {{ $menu->name }}
                                </td>
                                <td class="px-6 py-4">
                                    {{ $menu->price }}
                                </td>
                                <td class="px-6 py-4">
                                    <img src="{{ Storage::url($menu->image_path) }}" class="w-16 h-16 rounded"
                                        src="" alt="">
                                </td>
                                <td class="px-6 py-4">
                                    {{ $menu->description }}
                                </td>
                                <td class="px-6 py-4 flex justify-around">
                                    <a href="{{ route('menus.edit', $menu->id) }}"
                                        class="text-yellow-500">edit</a>
                                    <form action="{{ route('menus.destroy', $menu->id) }}" method="post"
                                        onsubmit="return confirm('Are you sure?');">
                                        @csrf
                                        @method('DELETE')
                                        <button class="btn btn-link text-red-500">delete</button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</x-admin-layout>
