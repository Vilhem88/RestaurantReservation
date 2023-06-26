<x-guest-layout>
    <section>
        <div class="mt-4 text-center">
          <h2 class="text-3xl font-bold text-transparent bg-clip-text bg-gradient-to-r from-green-400 to-blue-500">
            Our Menus</h2>
        </div>
        <div class="container w-full px-5 py-6 mx-auto">
          <div class="grid lg:grid-cols-4 gap-y-6">
            @foreach ($menus as $menu)
            <x-menu :menu="$menu" />
            @endforeach
          </div>
        </div>
      </section>
</x-guest-layout>
