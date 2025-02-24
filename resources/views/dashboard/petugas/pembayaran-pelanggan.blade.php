<x-app-layout>
  <section class="grid w-full grid-cols-4 gap-2">
    {{-- Form Pencarian --}}
    <form action="{{ route('petugas.pembayaran-search') }}" method="GET" class="grid grid-cols-6 col-span-8 gap-2">
      <div class="flex items-center w-full col-span-2 gap-2 overflow-hidden bg-white rounded-lg shadow-primary">
        <input type="text" name="search" value="{{ request('search') }}" placeholder="Masukkan No Kontrol"
          class="w-full h-full px-4 py-2 border-none focus:outline-none focus:ring-0">
        <button type="submit"
          class="px-4 py-2 text-white bg-teal-700 border border-teal-700 rounded-lg hover:bg-transparent hover:text-teal-700 transition-3s">
          Cari
        </button>
      </div>
    </form>

    {{-- Menampilkan Hasil Pencarian --}}
    <div class="grid grid-cols-4 col-span-4 gap-5 mt-5">
      @if($pemakaians->isEmpty())
      <p class="col-span-4 text-gray-500">Data tidak ditemukan.</p>
      @else
      @foreach ($pemakaians as $pemakaian)
      <a href="{{ route('petugas.detail-pembayaran', $pemakaian->id) }}"
        class="shadow-primary bg-white p-2 rounded-lg col-span-2 h-[100px] cursor-pointer relative">
        <div class="flex flex-col justify-between w-full h-full">
          <div>
            <button class=" text-sm font-medium rounded-md 
                {{ $pemakaian->status === 'Lunas' ? 'text-teal-700' : 'text-red-700' }}">
              {{ $pemakaian->status ?? 'Belum ada status' }}
            </button>
          </div>
          <div class="w-full">
            <p class="font-bold text-slate-700">{{ $pemakaian->pelanggan->no_kontrol ?? 'Tanpa Kontrol' }}</p>
            <p class="text-sm text-gray-600">{{ $pemakaian->pelanggan->nama ?? 'Tanpa Nama' }}</p>
          </div>
        </div>
        <div class="absolute top-5 right-5">
          <p class="text-xs font-semibold text-slate-700">{{ $pemakaian->bulan }} / {{ $pemakaian->tahun }}</p>
        </div>
      </a>
      @endforeach
      @endif
    </div>
  </section>
</x-app-layout>