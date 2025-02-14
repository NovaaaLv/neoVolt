<x-app-layout>
  <x-ui.content.header title="Dashboard / Pembayaran Pelanggan" username="Ade Nova W" />

  <section class="w-full grid grid-cols-4 gap-2">
    {{-- Search No Kontrol --}}
    <form action="{{ route('petugas.pembayaran') }}" method="GET" class="col-span-8 grid grid-cols-6 gap-2">
      <div class="col-span-2 w-full bg-white shadow-primary rounded-lg overflow-hidden flex gap-2 items-center">
        <div class="w-full h-full">
          <input type="text" name="search" placeholder="search"
            class="w-full h-full border-none focus:outline-none focus:ring-0">
        </div>
        <i class="ti ti-search text-xl px-4"></i>
      </div>
      <button type="submit"
        class="col-span-1 w-full shadow-primary rounded-lg py-2 bg-gray-500 text-white border border-gray-500 hover:font-bold transition-3s hover:bg-white hover:text-gray-700">
        Proses
      </button>
    </form>

    {{-- Main --}}
    <div class="col-span-4 grid grid-cols-4 gap-5 mt-5">
      @foreach ($pemakaians as $pemakaian)
      <div class="shadow-primary bg-white p-2 rounded-lg col-span-2 h-[100px] cursor-pointer relative">
        <div class="w-full h-full flex flex-col justify-between">
          <div>
            <button class="px-4 text-sm font-medium text-white rounded-md 
              {{ $pemakaian->status === 'Lunas' ? 'bg-teal-700' : 'bg-red-700' }}">
              {{ $pemakaian->status ?? 'Belum ada status' }}
            </button>
          </div>
          <div class="w-full">
            <x-ui.content.form.lable title="{{ $pemakaian->pelanggan->no_kontrol ?? 'Tanpa Kontrol' }}" />
            <x-ui.content.form.text-placeholder value="{{ $pemakaian->pelanggan->nama ?? 'Tanpa Nama' }}" />
          </div>
        </div>
        <div class="absolute top-5 right-5">
          <p class="text-xs font-semibold text-slate-700">{{ $pemakaian->bulan_angka }} / {{ $pemakaian->tahun }}</p>
        </div>
      </div>
      @endforeach
    </div>
  </section>
</x-app-layout>