<x-app-layout>
  <section class="grid w-full grid-cols-8 gap-2">

    {{-- Main --}}
    <div class="flex justify-between col-span-8 p-5 bg-white rounded-lg shadow-primary">
      <x-ui.content.form.wrapper>
        <x-ui.content.form.lable title="Nama" />
        <x-ui.content.form.text-placeholder value="{{$pemakaian->pelanggan->nama}}" />
      </x-ui.content.form.wrapper>
      <x-ui.content.form.wrapper>
        <x-ui.content.form.lable title="Alamat" />
        <x-ui.content.form.text-placeholder value="{{$pemakaian->pelanggan->alamat}}" />
      </x-ui.content.form.wrapper>
      <x-ui.content.form.wrapper>
        <x-ui.content.form.lable title="No Telp" />
        <x-ui.content.form.text-placeholder value="{{$pemakaian->pelanggan->no_telp}}" />
      </x-ui.content.form.wrapper>
      <x-ui.content.form.wrapper>
        <x-ui.content.form.lable title="Jenis Pelanggan" />
        <x-ui.content.form.text-placeholder value="{{$pemakaian->pelanggan->tarif->jenis_plg}}" />
      </x-ui.content.form.wrapper>
    </div>

    {{-- Billing Information --}}
    <div class="relative grid grid-cols-2 col-span-8 gap-5 p-5 bg-white rounded-lg shadow-primary">
      <x-ui.content.form.wrapper>
        <x-ui.content.form.lable title="Tahun" />
        <x-ui.content.form.text-placeholder value="{{$pemakaian->tahun}}" />
      </x-ui.content.form.wrapper>
      <x-ui.content.form.wrapper>
        <x-ui.content.form.lable title="Bulan" />
        <x-ui.content.form.text-placeholder value="{{$bulanText}}" />
      </x-ui.content.form.wrapper>
      <x-ui.content.form.wrapper>
        <x-ui.content.form.lable title="Meter Awal" />
        <x-ui.content.form.text-placeholder value="{{$pemakaian->meter_awal}}" />
      </x-ui.content.form.wrapper>
      <x-ui.content.form.wrapper>
        <x-ui.content.form.lable title="Meter Akhir" />
        <x-ui.content.form.text-placeholder value="{{$pemakaian->meter_akhir}}" />
      </x-ui.content.form.wrapper>
      <x-ui.content.form.wrapper>
        <x-ui.content.form.lable title="Jumlah Pakai" />
        <x-ui.content.form.text-placeholder value="{{$pemakaian->jumlah_pakai}}" />
      </x-ui.content.form.wrapper>
      <x-ui.content.form.wrapper>
        <x-ui.content.form.lable title="Biaya Beban Pemakai" />
        <x-ui.content.form.text-placeholder value="Rp. {{$pemakaian->biaya_beban_pemakaian}}" />
      </x-ui.content.form.wrapper>
      <x-ui.content.form.wrapper>
        <x-ui.content.form.lable title="Biaya Pemakaian" />
        <x-ui.content.form.text-placeholder value="Rp. {{$pemakaian->biaya_pemakaian}}" />
      </x-ui.content.form.wrapper>

      <div class="absolute top-5 right-5">
        <p class="px-4 py-2 text-sm font-medium  
                      {{ $pemakaian->status === 'Lunas' ? 'text-teal-700' : 'text-red-700' }}">
          {{ $pemakaian->status ?? 'Belum ada status' }}
        </p>
      </div>
    </div>

    {{-- button --}}
    @if ($pemakaian->status != "Lunas")
    <form action="{{ route('petugas.update-pembayaran', $pemakaian->id) }}" method="POST"
      class="flex items-center justify-end col-span-8 gap-5">
      @csrf
      @method('PUT')
      <button type="submit"
        class="col-span-2 px-5 py-2 text-white bg-teal-700 border border-teal-700 rounded-lg hover:text-teal-700 transition-3s hover:bg-transparent">
        Konfirmasi Pembayaran
      </button>
    </form>
    @else
    <a href="{{route('petugas.export-pemakaian',$pemakaian->id)}}"
      class="col-span-2 px-6 py-2 mt-5 font-semibold text-center text-white bg-red-400 border border-red-400 rounded-md transition-3s hover:bg-transparent hover:text-red-400">
      <i class="ti ti-file"></i>
      Export PDF</a>
    @endif

  </section>
</x-app-layout>