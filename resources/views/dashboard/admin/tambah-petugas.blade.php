<x-app-layout>
  <x-ui.content.header title="Dashboard / Tambah Petugas " username="Ade Nova W" />

  <section class="w-full shadow">
    @if (session('success'))
    <div class="bg-green-500 text-white p-3 rounded-lg w-full h-full shadow-primary">
      {{ session('success') }}
    </div>
    @endif
  </section>

  <section class="w-full p-5 rounded-lg shadow-primary bg-white flex gap-5 items-center">
    <div class="w-[550px]">
      <img src="{{asset('build/assets/images/Telecommuting-rafiki.svg')}}" alt="" class="w-full h-full">
    </div>
    <form action="{{route('add-petugas')}}" method="POST" class="flex w-full gap-5 items-end justify-between relative">
      @csrf
      <div class="space-y-3 w-[50%]">
        <div class="">
          <x-ui.content.form.lable title="Username" />
          <x-ui.content.form.input-field name="name" type="text" id="name" required />
        </div>
        <div class="">
          <x-ui.content.form.lable title="Email" />
          <x-ui.content.form.input-field name="email" type="email" id="email" required />
        </div>
        <div class="">
          <x-ui.content.form.lable title="Password" />
          <x-ui.content.form.input-field name="password" type="password" id="password" required />
        </div>
        <div class="">
          <x-ui.content.form.lable title="Role" />
          <select name="role"
            class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-teal-700 text-sm">
            <option value="petugas">Petugas</option>
            <option value="petugas_lapangan">Petugas Lapangan</option>
          </select>
        </div>
      </div>
      <div class="flex flex-col gap-5">
        <button type="submit"
          class="col-span-2 px-5 py-2 rounded-lg hover:text-teal-700 border-teal-700 border bg-teal-700 transition-3s text-white hover:bg-transparent">
          Tambah
        </button>
      </div>
    </form>
  </section>
</x-app-layout>