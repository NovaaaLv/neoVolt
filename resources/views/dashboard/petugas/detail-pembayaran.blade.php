<x-app-layout>
  <x-ui.content.header title="Dashboard / Pembayaran Pelanggan / Detail" username="Ade Nova W" />

  <section class="w-full grid grid-cols-8 gap-2">
    {{-- Search No Kontrol --}}
    <form action="" class="col-span-8 grid grid-cols-6 gap-2">
      <div class="col-span-2 w-full bg-white shadow-primary rounded-lg overflow-hidden flex gap-2 items-center">
        <div class="w-full h-full">
          <input type="text" name="" id="" placeholder="search"
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
    <div class="col-span-8 p-5 bg-white rounded-lg shadow-primary flex justify-between">
      <x-ui.content.form.wrapper>
        <x-ui.content.form.lable title="Nama" />
        <x-ui.content.form.text-placeholder value="Ade Nova Wiguna" />
      </x-ui.content.form.wrapper>
      <x-ui.content.form.wrapper>
        <x-ui.content.form.lable title="Alamat" />
        <x-ui.content.form.text-placeholder value="Jln Ploto Mars. rt 01/07 Jawa" />
      </x-ui.content.form.wrapper>
      <x-ui.content.form.wrapper>
        <x-ui.content.form.lable title="No Telp" />
        <x-ui.content.form.text-placeholder value="086861467651" />
      </x-ui.content.form.wrapper>
      <x-ui.content.form.wrapper>
        <x-ui.content.form.lable title="Jenis Pelanggan" />
        <x-ui.content.form.text-placeholder value="R1 Perumahan" />
      </x-ui.content.form.wrapper>
    </div>

    {{-- Billing Information --}}
    <div class="col-span-8 p-5 bg-white rounded-lg shadow-primary grid grid-cols-2 gap-5">
      <x-ui.content.form.wrapper>
        <x-ui.content.form.lable title="Tahun" />
        <x-ui.content.form.text-placeholder value="2024" />
      </x-ui.content.form.wrapper>
      <x-ui.content.form.wrapper>
        <x-ui.content.form.lable title="Bulan" />
        <x-ui.content.form.text-placeholder value="Januari" />
      </x-ui.content.form.wrapper>
      <x-ui.content.form.wrapper>
        <x-ui.content.form.lable title="Meter Awal" />
        <x-ui.content.form.text-placeholder value="1200" />
      </x-ui.content.form.wrapper>
      <x-ui.content.form.wrapper>
        <x-ui.content.form.lable title="Meter Akhir" />
        <x-ui.content.form.text-placeholder value="1350" />
      </x-ui.content.form.wrapper>
      <x-ui.content.form.wrapper>
        <x-ui.content.form.lable title="Jumlah Pakai" />
        <x-ui.content.form.text-placeholder value="150" />
      </x-ui.content.form.wrapper>
      <x-ui.content.form.wrapper>
        <x-ui.content.form.lable title="Biaya Beban Pemakai" />
        <x-ui.content.form.text-placeholder value="Rp 50.000" />
      </x-ui.content.form.wrapper>
      <x-ui.content.form.wrapper>
        <x-ui.content.form.lable title="Biaya Pemakaian" />
        <x-ui.content.form.text-placeholder value="Rp 200.000" />
      </x-ui.content.form.wrapper>
    </div>

    {{-- button --}}

    <form action="" class="col-span-8 flex items-center justify-end gap-5">
      <button
        class="col-span-2 px-5 py-2 rounded-lg hover:text-teal-700 border-teal-700 border bg-teal-700 transition-3s text-white hover:bg-transparent">
        Konfirmasi Pembayaran
      </button>
      <button
        class="col-span-2 px-5 py-2 rounded-lg bg-red-700 text-white transition-3s hover:bg-transparent hover:text-red-700 border border-red-700">
        Batal
      </button>
    </form>
  </section>
</x-app-layout>