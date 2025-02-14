<x-app-layout>
  <x-ui.content.header title="Dashboard / Tambah Petugas " username="Ade Nova W" />

  <section class="w-full p-5 rounded-lg shadow-primary bg-white flex gap-5 items-center">
    <div class="w-[250px]">
      <img src="{{asset('build/assets/images/Telecommuting-rafiki.svg')}}" alt="" class="w-full h-full">
    </div>
    <form action="" class="flex w-full gap-5 items-end justify-between">
      <div class="space-y-3 w-[50%]">
        <div class="">
          <x-ui.content.form.lable title="Username" />
          <x-ui.content.form.input-field />
        </div>
        <div class="">
          <x-ui.content.form.lable title="Email" />
          <x-ui.content.form.input-field />
        </div>
        <div class="">
          <x-ui.content.form.lable title="Password" />
          <x-ui.content.form.input-field />
        </div>
      </div>
      <div class="">
        <button
          class="col-span-2 px-5 py-2 rounded-lg hover:text-teal-700 border-teal-700 border bg-teal-700 transition-3s text-white hover:bg-transparent">
          Konfirmasi Pembayaran
        </button>
        <button
          class="col-span-2 px-5 py-2 rounded-lg bg-red-700 text-white transition-3s hover:bg-transparent hover:text-red-700 border border-red-700">
          Batal
        </button>
      </div>
    </form>
  </section>
</x-app-layout>