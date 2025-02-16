<x-app-layout>
  <section class="w-full shadow">
    @if (session('success'))
    <div class="w-full h-full p-3 text-white bg-green-500 rounded-lg shadow-primary">
      {{ session('success') }}
    </div>
    @endif
  </section>

  <section class="flex items-center w-full gap-5 p-5 bg-white rounded-lg shadow-primary">
    <div class="w-[550px]">
      <img src="{{asset('build/assets/images/Telecommuting-rafiki.svg')}}" alt="" class="w-full h-full">
    </div>
    <form action="{{route('admin.add-tarif')}}" method="POST"
      class="relative flex items-end justify-between w-full gap-5">
      @csrf
      <div class="space-y-3 w-[50%]">
        <div class="">
          <x-ui.content.form.lable title="Jenis Pelanggan" />
          <x-ui.content.form.input-field name="jenis_plg" type="text" id="jenis_plg" required />
        </div>
        <div class="">
          <x-ui.content.form.lable title="Biaya Beban" />
          <x-ui.content.form.input-field name="biaya_beban" type="number" id="biaya_beban" required />
        </div>
        <div class="">
          <x-ui.content.form.lable title="Tarif per KWH" />
          <x-ui.content.form.input-field name="tarif_kwh" type="number" id="tarif_kwh" required />
        </div>

      </div>
      <div class="flex flex-col gap-5">
        <button type="submit"
          class="col-span-2 px-5 py-2 text-white bg-teal-700 border border-teal-700 rounded-lg hover:text-teal-700 transition-3s hover:bg-transparent">
          Tambah
        </button>
      </div>
    </form>
  </section>
</x-app-layout>