<x-guest-layout>

    <section>
        <div class="mt-4 text-center">
          <h2 class="text-3xl font-bold text-transparent bg-clip-text bg-gradient-to-r from-green-400 to-blue-500">
            Our Categories</h2>
        </div>
        <div class="container w-full px-5 py-6 mx-auto">
          <div class="grid lg:grid-cols-4 gap-y-6">
            @foreach ($categories as $category)
            <div class="max-w-xs mx-4 mb-2 rounded-lg shadow-lg">
              <img class="w-full h-48" src="{{Storage::url( $category->image_path )}}"
                alt="Image" />
              <div class="px-6 py-4">
                  <a href="{{ route('frontendCategories.show', $category->id) }}"><h4 class="hover:text-green-400 mb-3 text-xl font-semibold tracking-tight text-green-600 uppercase">{{ $category->name }}</h4> </a>
    
                <p class="leading-normal text-gray-700">{{ $category->description }}</p>
              </div>
            </div>
            @endforeach
          </div>
        </div>
      </section>
</x-guest-layout>
