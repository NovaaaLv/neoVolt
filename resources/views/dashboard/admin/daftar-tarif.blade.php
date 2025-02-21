<x-app-layout>
  @if (session('success'))
  <div class="w-full p-3 mb-4 text-white bg-teal-700 rounded-lg shadow-primary">
    {{ session('success') }}
  </div>
  @endif

  <section class="p-6 bg-white rounded-lg shadow-md">
    <div class="flex items-center justify-between mb-4">
      <h2 class="text-xl font-semibold text-gray-800">Daftar Tarif</h2>
      <a href="{{ route('admin.dashboard-add-tarif') }}"
        class="px-5 py-2 font-medium text-white transition-all duration-300 bg-teal-600 border border-teal-600 rounded-lg hover:bg-transparent hover:text-teal-600">
        Tambah Tarif
      </a>
    </div>

    @if ($tarif->isEmpty())
    <p class="py-6 text-center text-gray-500">😔 Tidak ada data tarif yang tersedia.</p>
    @else
    <div class="">
      <table class="w-full border border-collapse border-gray-300 rounded-lg shadow-md">
        <thead class="text-white bg-teal-600">
          <tr>
            <th class="p-3 border border-gray-300">No</th>
            <th class="p-3 border border-gray-300">Jenis Pelanggan</th>
            <th class="p-3 border border-gray-300">Biaya Beban (Rp)</th>
            <th class="p-3 border border-gray-300">Tarif per KWh (Rp)</th>
            <th class="p-3 border border-gray-300">Aksi</th>
          </tr>
        </thead>
        <tbody>
          @foreach ($tarif as $index => $item)
          <tr class="text-center transition-all duration-300 hover:bg-teal-100">
            <td class="p-3 border border-gray-300">{{ $index + 1 }}</td>
            <td class="p-3 border border-gray-300">{{ $item->jenis_plg }}</td>
            <td class="p-3 border border-gray-300">Rp {{ number_format($item->biaya_beban, 0, ',', '.') }}</td>
            <td class="p-3 border border-gray-300">Rp {{ number_format($item->tarif_kwh, 0, ',', '.') }}</td>
            <td class="relative flex items-center justify-center p-3 border border-gray-300" x-data="{ open: false }">
              <!-- Tombol Tiga Titik -->
              <button @click="open = !open"
                class="w-[35px] h-[35px] rounded-full flex items-center justify-center hover:bg-teal-200 transition-all duration-300">
                <i class="text-xl ti-dots ti"></i>
              </button>

              <!-- Dropdown Aksi -->
              <div x-show="open" @click.away="open = false"
                class="absolute z-50 mt-10 bg-white border border-gray-300 rounded-lg shadow-lg right-12 w-36"
                x-transition:enter="transition ease-out duration-200" x-transition:enter-start="opacity-0 scale-90"
                x-transition:enter-end="opacity-100 scale-100" x-transition:leave="transition ease-in duration-100"
                x-transition:leave-start="opacity-100 scale-100" x-transition:leave-end="opacity-0 scale-90">
                <a href="{{ route('admin.edit-tarif', $item->id) }}"
                  class="flex items-center gap-2 px-5 py-1 text-sm font-semibold uppercase text-slate-800/70">
                  <i class="text-lg text-yellow-500 ti ti-pencil"></i>
                  Update
                </a>
                <form action="{{ route('admin.delete-tarif', $item->id) }}" method="POST"
                  onsubmit="return confirm('Apakah Anda yakin ingin menghapus Tarif ini?');">
                  @csrf
                  @method('DELETE')
                  <button type="submit"
                    class="flex items-center gap-2 px-5 py-1 text-sm font-semibold text-red-600 uppercase">
                    <i class="text-lg text-red-500 ti ti-trash"></i> Delete
                  </button>
                </form>
              </div>
            </td>
          </tr>
          @endforeach
        </tbody>
      </table>
    </div>
    @endif
  </section>
</x-app-layout>