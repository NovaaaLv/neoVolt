<x-app-layout>
  <section class="w-full grid grid-cols-8 gap-2">

    {{-- Main --}}
    <div class="col-span-8 p-5 bg-white rounded-lg shadow-primary flex justify-between">
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
    <div class="col-span-8 p-5 bg-white rounded-lg shadow-primary grid grid-cols-2 gap-5 relative">
      <x-ui.content.form.wrapper>
        <x-ui.content.form.lable title="Tahun" />
        <x-ui.content.form.text-placeholder value="{{$pemakaian->tahun}}" />
      </x-ui.content.form.wrapper>
      <x-ui.content.form.wrapper>
        <x-ui.content.form.lable title="Bulan" />
        <x-ui.content.form.text-placeholder value="{{$pemakaian->bulan}}" />
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
        <button class="px-4 py-2 text-sm font-medium text-white rounded-md 
                      {{ $pemakaian->status === 'Lunas' ? 'bg-teal-700' : 'bg-red-700' }}">
          {{ $pemakaian->status ?? 'Belum ada status' }}
        </button>
      </div>
    </div>

    {{-- button --}}
    @if ($pemakaian->status != "Lunas")
    <form action="{{ route('petugas.update-pembayaran', $pemakaian->id) }}" method="POST"
      class="col-span-8 flex items-center justify-end gap-5">
      @csrf
      @method('PUT')
      <button type="submit"
        class="col-span-2 px-5 py-2 rounded-lg hover:text-teal-700 border-teal-700 border bg-teal-700 transition-3s text-white hover:bg-transparent">
        Konfirmasi Pembayaran
      </button>
    </form>
    @endif

  </section>
</x-app-layout>