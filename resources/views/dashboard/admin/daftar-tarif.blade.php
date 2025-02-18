<x-app-layout>
  <section class="bg-white rounded-lg shadow-md p-6">
    <div class="flex items-center justify-between mb-4">
      <h2 class="text-xl font-semibold text-gray-800">Daftar Tarif</h2>
      <a href="{{ route('admin.dashboard-add-tarif') }}"
        class="px-5 py-2 rounded-lg bg-teal-600 text-white font-medium border border-teal-600 transition-all duration-300 hover:bg-transparent hover:text-teal-600">
        Tambah Tarif
      </a>
    </div>

    @if ($tarif->isEmpty())
    <p class="text-gray-500 text-center py-6">😔 Tidak ada data tarif yang tersedia.</p>
    @else
    <div class="overflow-x-auto">
      <table class="w-full border-collapse border border-gray-300 rounded-lg shadow-md">
        <thead class="bg-teal-600 text-white">
          <tr>
            <th class="border border-gray-300 p-3">No</th>
            <th class="border border-gray-300 p-3">Jenis Pelanggan</th>
            <th class="border border-gray-300 p-3">Biaya Beban (Rp)</th>
            <th class="border border-gray-300 p-3">Tarif per KWh (Rp)</th>
          </tr>
        </thead>
        <tbody>
          @foreach ($tarif as $index => $item)
          <tr class="text-center transition-all duration-300 hover:bg-teal-100">
            <td class="border border-gray-300 p-3">{{ $index + 1 }}</td>
            <td class="border border-gray-300 p-3">{{ $item->jenis_plg }}</td>
            <td class="border border-gray-300 p-3">Rp {{ number_format($item->biaya_beban, 0, ',', '.') }}</td>
            <td class="border border-gray-300 p-3">Rp {{ number_format($item->tarif_kwh, 0, ',', '.') }}</td>
          </tr>
          @endforeach
        </tbody>
      </table>
    </div>
    @endif
  </section>
</x-app-layout>