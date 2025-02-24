<x-app-layout>
  <section>
    {{-- Search No Kontrol --}}
    <form action="{{ route('petugas-lapangan.daftar-pelanggan-search') }}" method="GET"
      class="grid grid-cols-6 col-span-8 gap-2">
      <div class="flex items-center w-full col-span-2 gap-2 overflow-hidden bg-white rounded-lg shadow-primary">
        <input type="text" name="search" value="{{ request('search') }}" placeholder="Masukkan No Kontrol"
          class="w-full h-full px-4 py-2 border-none focus:outline-none focus:ring-0">
        <button type="submit"
          class="px-4 py-2 text-white bg-teal-700 border border-teal-700 rounded-lg hover:bg-transparent hover:text-teal-700 transition-3s">
          Cari
        </button>
      </div>
    </form>

    {{-- Pesan Flash untuk Validasi --}}
    @if(session('error'))
    <p class="mt-2 text-red-500 text-xsa">{{ session('error') }}</p>
    @endif
  </section>

  {{-- Hasil Pencarian --}}
  <section class="mt-5">
    @if(isset($pelanggan) && $pelanggan->isNotEmpty())
    <section class="grid w-full grid-cols-8 gap-5 rounded-lg">
      @foreach ($pelanggan as $pelangganOut)
      <div
        class="col-span-3 px-4 py-2 h-[100px] bg-white shadow-primary rounded-lg flex justify-between flex-col relative">
        <p class="text-sm font-semibold text-slate-500">No {{$pelangganOut->no_kontrol}}</p>
        <div class="">
          <p class="text-base font-semibold leading-4 text-slate-800">{{$pelangganOut->nama}}</p>
          <p class="text-sm text-slate-500">{{$pelangganOut->alamat}}</p>
        </div>

        <div class="absolute right-2 top-2">
          <a href="{{route('petugas-lapangan.daftar-pelanggan.detail', ['id' => $pelangganOut->id])}}"
            class="flex items-center gap-1 px-3 py-1 text-white bg-teal-700 border border-teal-700 rounded cursor-pointer transition-3s hover:bg-transparent hover:text-teal-700">
            <i class="ti ti-eye text-lg mt-[2px]"></i>
            <p class="text-sm font-semibold">Check</p>
          </a>
        </div>
      </div>
      @endforeach
    </section>
    @elseif(request('search'))
    <p class="mt-2 text-red-500">Pelanggan dengan No Kontrol "{{ request('search') }}" tidak ditemukan.</p>
    @else
    <div class="flex flex-col items-center justify-center w-full p-5 bg-white rounded-lg shadow-primary">
      <div class="w-[300px]">
        <img src={{asset('build/assets/images/on-not-search.svg')}} alt="" class="w-full h-full">
      </div>
      <p class="w-full text-2xl font-semibold text-center capitalize text-slate-900">Masukkan No Kontrol untuk melihat
        data pelanggan.
      </p>
    </div>
    @endif
  </section>
</x-app-layout>