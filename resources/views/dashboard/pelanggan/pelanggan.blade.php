<x-guest-layout>
  <section class="flex items-center justify-center mt-10">
    <div class="w-full max-w-2xl p-6 bg-white shadow-primary rounded-xl">
      <h1 class="mb-4 text-2xl font-bold text-center text-gray-700">Cari Data</h1>

      <form action="{{ route('pelanggan.pelanggan.search') }}" method="GET">
        <input type="number" name="search" value="{{ request('search') }}" placeholder="Masukkan No Kontrol"
          class="w-full p-3 mb-4 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-teal-700">
        <button type="submit" class="w-full p-3 mt-2 text-white bg-teal-700 rounded-lg hover:bg-teal-800">Cari</button>
      </form>

      @if ($search != null)
      <div id="card-container" class="mt-4 space-y-4">
        @foreach($pelanggan as $item)
        <div class="relative p-4 text-white bg-teal-700 rounded-lg shadow-lg card">
          <p class="text-sm font-light">No. Kontrol: <span class="font-semibold">{{ $item->no_kontrol }}</span></p>
          <p class="text-lg font-semibold">{{ $item->nama }}</p>
          <p class="text-sm">Alamat: {{ $item->alamat }}</p>
          <div class="absolute right-3 bottom-3">
            <a href="{{route('pelanggan.pelanggan.all-pemakaian',$item->id)}}"
              class="px-4 py-1 bg-transparent border border-white rounded-md transition-3s hover:bg-teal-800">Check</a>
          </div>
        </div>
        @endforeach
      </div>
      @endif


    </div>
  </section>
</x-guest-layout>