<x-guest-layout>
  <section class="flex justify-center items-center mt-10">
    <div class="w-full max-w-2xl p-6 bg-white shadow-primary rounded-xl">
      <h1 class="text-2xl font-bold text-gray-700 text-center mb-4">Cari Data</h1>

      <form action="{{ route('pelanggan.pelanggan.search') }}" method="GET">
        <input type="text" name="search" value="{{ request('search') }}" placeholder="Masukkan No Kontrol"
          class="w-full p-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-teal-700 mb-4">
        <button type="submit" class="w-full p-3 bg-teal-700 text-white rounded-lg mt-2 hover:bg-teal-800">Cari</button>
      </form>

      <div id="card-container" class="space-y-4 mt-4">
        @foreach($pelanggan as $item)
        <div class="card bg-teal-700 text-white p-4 rounded-lg shadow-lg">
          <p class="text-sm font-light">No. Kontrol: <span class="font-semibold">{{ $item->no_kontrol }}</span></p>
          <p class="text-lg font-semibold">{{ $item->nama }}</p>
          <p class="text-sm">Alamat: {{ $item->alamat }}</p>
        </div>
        @endforeach
      </div>
    </div>
  </section>
</x-guest-layout>