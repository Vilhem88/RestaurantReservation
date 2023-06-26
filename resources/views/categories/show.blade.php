<x-guest-layout>

    <section>
        <div class="text-center">
          <h2 class="text-3xl font-bold text-transparent bg-clip-text bg-gradient-to-r from-green-400 to-blue-500">
            Our Menus</h2>
        </div>
        <div class="container w-full px-5 py-6 mx-auto">
          <div class="grid lg:grid-cols-4 gap-y-6">
            @foreach ($category->menus as $menu)
            {{-- {{ dd($menu) }} --}}
            <div class="max-w-xs mx-4 mb-2 rounded-lg shadow-lg">
              <img class="w-full h-48" src="{{Storage::url( $menu->image_path )}}"
                alt="Image" />
              <div class="px-6 py-4">
                  <a href="{{ route('frontendCategories.show', $menu->id) }}"><h4 class="hover:text-green-400 mb-3 text-xl font-semibold tracking-tight text-green-600 uppercase">{{ $menu->name }}</h4> </a>
    
                <p class="leading-normal text-gray-700">{{ $menu->description }}</p>
              </div>
              <div class="flex items-center justify-between p-4">
                <button class="px-4 py-2 bg-green-600 text-green-50">Order Now</button>
                <span class="text-xl text-green-600">$ {{ $menu->price }}</span>
              </div>
            </div>
            @endforeach
          </div>
        </div>
      </section>
</x-guest-layout>
