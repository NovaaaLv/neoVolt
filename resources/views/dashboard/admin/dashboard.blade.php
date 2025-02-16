<x-app-layout>
  <section class="grid grid-cols-3 gap-5">
    <div class="flex items-center justify-center w-full h-24 col-span-1 gap-5 p-3 bg-white rounded-lg shadow-primary">
      <div class="w-[40px] h-[40px] opacity-90">
        <img src="{{asset('build/assets/icons/dashboardCard/petugas.png')}}" alt="" class="w-full h-full">
      </div>
      <div class="-mt-2">
        <p class="text-xl font-bold text-[#43766c]/90 ">40</p>
        <p class="text-base font-semibold uppercase text-[#43766c]/80 leading-3">petugas</p>
      </div>
    </div>
    <div class="flex items-center justify-center w-full h-24 col-span-1 gap-5 p-3 bg-white rounded-lg shadow-primary">
      <div class="w-[40px] h-[40px] opacity-90">
        <img src="{{asset('build/assets/icons/dashboardCard/petugas_lapangan.png')}}" alt="" class="w-full h-full">
      </div>
      <div class="-mt-2">
        <p class="text-xl font-bold text-[#43766c]/90 ">40</p>
        <p class="text-base font-semibold uppercase text-[#43766c]/80 leading-3">petugas lapangan</p>
      </div>
    </div>
    <div class="flex items-center justify-center w-full h-24 col-span-1 gap-5 p-3 bg-white rounded-lg shadow-primary">
      <div class="w-[40px] h-[40px] opacity-90">
        <img src="{{asset('build/assets/icons/dashboardCard/pelanggan.png')}}" alt="" class="w-full h-full">
      </div>
      <div class="-mt-2">
        <p class="text-xl font-bold text-[#43766c]/90">40</p>
        <p class="text-base  font-semibold uppercase text-[#43766c]/80 leading-3">pelanggan</p>
      </div>
    </div>
  </section>
</x-app-layout>