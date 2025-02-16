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
      <img src="{{asset('build/assets/images/Add User-amico.svg')}}" alt="" class="w-full h-full">
    </div>
    <form action="{{route('add-petugas')}}" method="POST" class="relative flex items-end justify-between w-full gap-5">
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
            class="w-full px-4 py-2 text-sm border rounded-lg focus:outline-none focus:ring-2 focus:ring-teal-700">
            <option value="petugas">Petugas</option>
            <option value="petugas_lapangan">Petugas Lapangan</option>
          </select>
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