<x-app-layout>
  <x-ui.content.header title="Dashboard / Daftar Pelanggan" username="Ade Nova W" />

  <section>
    {{-- Search No Kontrol --}}
    <form action="{{ route('petugas-lapangan.daftar-pelanggan-search') }}" method="GET"
      class="col-span-8 grid grid-cols-6 gap-2">
      <div class="col-span-2 w-full bg-white shadow-primary rounded-lg overflow-hidden flex gap-2 items-center">
        <div class="w-full h-full">
          <input type="number" name="search" placeholder="Masukkan No Kontrol" value="{{ request('search') }}"
            class="w-full h-full border-none focus:outline-none focus:ring-0">
        </div>
        <i class="ti ti-search text-xl px-4"></i>
      </div>
      <button type="submit"
        class="col-span-1 w-full shadow-primary rounded-lg py-2 bg-gray-500 text-white border border-gray-500 hover:font-bold transition-3s hover:bg-white hover:text-gray-700">
        Proses
      </button>
    </form>

    {{-- Pesan Flash untuk Validasi --}}
    @if(session('error'))
    <p class="text-red-500 mt-2 text-xsa">{{ session('error') }}</p>
    @endif
  </section>

  {{-- Hasil Pencarian --}}
  <section class="mt-5">
    @if(isset($pelanggan) && $pelanggan->isNotEmpty())
    <section class="w-full rounded-lg grid grid-cols-8 gap-5">
      @foreach ($pelanggan as $pelangganOut)
      <div
        class="col-span-3 px-4 py-2 h-[100px] bg-white shadow-primary rounded-lg flex justify-between flex-col relative">
        <p class="text-sm text-slate-500 font-semibold">No {{$pelangganOut->no_kontrol}}</p>
        <div class="">
          <p class="font-semibold text-base text-slate-800 leading-4">{{$pelangganOut->nama}}</p>
          <p class="text-sm text-slate-500">{{$pelangganOut->alamat}}</p>
        </div>

        <div class="absolute right-2 top-2">
          <a href="#"
            class="flex items-center px-3 py-1 rounded bg-teal-700 text-white gap-1 transition-3s hover:bg-transparent hover:text-teal-700 border border-teal-700 cursor-pointer">
            <i class="ti ti-eye text-lg mt-[2px]"></i>
            <p class="text-sm font-semibold">Check</p>
          </a>
        </div>
      </div>
      @endforeach
    </section>
    @elseif(request('search'))
    <p class="text-red-500 mt-2">Pelanggan dengan No Kontrol "{{ request('search') }}" tidak ditemukan.</p>
    @else
    <div class="w-full p-5 shadow-primary bg-white rounded-lg flex justify-center items-center flex-col">
      <div class="w-[300px]">
        <img src={{asset('build/assets/images/on-not-search.svg')}} alt="" class="w-full h-full">
      </div>
      <p class="text-2xl font-semibold text-slate-900 capitalize w-full text-center">Masukkan No Kontrol untuk melihat
        data pelanggan.
      </p>
    </div>
    @endif
  </section>
</x-app-layout>