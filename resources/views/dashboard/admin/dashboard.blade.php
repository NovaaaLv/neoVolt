<x-app-layout>
  <section class="grid grid-cols-4 gap-5">
    <div class="flex items-center justify-center w-full h-24 col-span-1 gap-5 p-3 bg-white rounded-lg shadow-primary">
      <div class="w-[40px] h-[40px] opacity-90">
        <img src="{{asset('build/assets/icons/dashboardCard/petugas.png')}}" alt="" class="w-full h-full">
      </div>
      <div class="-mt-2">
        <p class="text-xl font-bold text-[#43766c]/90 ">{{$petugasCount}}</p>
        <p class="text-base font-semibold uppercase text-[#43766c]/80 leading-3">petugas</p>
      </div>
    </div>
    <div class="flex items-center justify-center w-full h-24 col-span-1 gap-5 p-3 bg-white rounded-lg shadow-primary">
      <div class="w-[40px] h-[40px] opacity-90">
        <img src="{{asset('build/assets/icons/dashboardCard/petugas_lapangan.png')}}" alt="" class="w-full h-full">
      </div>
      <div class="-mt-2">
        <p class="text-xl font-bold text-[#43766c]/90 ">{{$petugasLapanganCount}}</p>
        <p class="text-base font-semibold uppercase text-[#43766c]/80 leading-3">p lapangan</p>
      </div>
    </div>
    <div class="flex items-center justify-center w-full h-24 col-span-1 gap-5 p-3 bg-white rounded-lg shadow-primary">
      <div class="w-[40px] h-[40px] opacity-90">
        <img src="{{asset('build/assets/icons/dashboardCard/pelanggan.png')}}" alt="" class="w-full h-full">
      </div>
      <div class="-mt-2">
        <p class="text-xl font-bold text-[#43766c]/90">{{$pelangganCount}}</p>
        <p class="text-base  font-semibold uppercase text-[#43766c]/80 leading-3">pelanggan</p>
      </div>
    </div>
    <div class="flex items-center justify-center w-full h-24 col-span-1 gap-5 p-3 bg-white rounded-lg shadow-primary">
      <div class="w-[40px] h-[40px] opacity-90">
        <img src="{{asset('build/assets/icons/dashboardCard/line-chart.png')}}" alt="" class="w-full h-full">
      </div>
      <div class="-mt-2">
        <p class="text-xl font-bold text-[#43766c]/90">{{$transaksiCount}}</p>
        <p class="text-base  font-semibold uppercase text-[#43766c]/80 leading-3">transaksi</p>
      </div>
    </div>
  </section>

  <section class="p-6 mt-6 bg-white rounded-lg shadow-primary">
    <div class="flex items-center justify-between mb-5">
      <h2 class="text-2xl font-bold text-teal-700">Data Pemakaian</h2>
      <form method="GET" action="" class="flex space-x-3">
        <select name="tahun" class="py-2 border rounded-lg">
          <option value="">Pilih Tahun</option>
          @foreach(range(date('Y'), date('Y') - 3) as $year)
          <option value="{{ $year }}" {{ request('tahun') == $year ? 'selected' : '' }}>
            {{ $year }}
          </option>
          @endforeach
        </select>
        <select name="bulan" class="py-2 border rounded-lg">
          <option value="">Pilih Bulan</option>
          @foreach(['Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni', 'Juli', 'Agustus', 'September', 'Oktober',
          'November', 'Desember'] as $index => $bulan)
          <option value="{{ $index + 1 }}" {{ request('bulan') == $index + 1 ? 'selected' : '' }}>
            {{ $bulan }}
          </option>
          @endforeach
        </select>
        <button type="submit" class="px-8 py-2 text-white bg-teal-600 rounded-lg hover:bg-teal-700">
          Filter
        </button>
      </form>
    </div>

    <div class="overflow-x-auto">
      <table class="w-full text-sm text-left border border-teal-300 rounded-lg">
        <thead class="text-white uppercase bg-teal-600">
          <tr>
            <th class="px-4 py-3 text-left border">No</th>
            <th class="px-4 py-3 text-left border">Pelanggan</th>
            <th class="px-4 py-3 text-left border">Tahun</th>
            <th class="px-4 py-3 text-left border">Bulan</th>
            <th class="px-4 py-3 text-left border">Meter Awal</th>
            <th class="px-4 py-3 text-left border">Meter Akhir</th>
            <th class="px-4 py-3 text-left border">Jumlah Pakai</th>
            <th class="px-4 py-3 text-left border">Biaya Beban</th>
            <th class="px-4 py-3 text-left border">Biaya Pemakaian</th>
            <th class="px-4 py-3 text-center border">Status</th>
          </tr>
        </thead>
        <tbody class="text-gray-700">
          @php
          $filteredData = $pemakaianData->filter(function($pemakaian) {
          return (!request('tahun') || request('tahun') == $pemakaian->tahun) &&
          (!request('bulan') || request('bulan') == $pemakaian->bulan);
          });
          @endphp

          @if($filteredData->isEmpty())
          <tr>
            <td colspan="10" class="px-4 py-3 text-2xl font-semibold text-center text-gray-500 border">
              <div class="flex flex-col items-center justify-center gap-3">
                <div class="w-[300px]">
                  <img src="{{ asset('build/assets/images/on-not-search.svg') }}" alt="Data Kosong"
                    class="w-full h-full">
                </div>
                <p>Data kosong</p>
              </div>
            </td>
          </tr>
          @else
          @foreach($filteredData as $index => $pemakaian)
          <tr class="bg-white border-b hover:bg-gray-50">
            <td class="px-4 py-3 text-left border">{{ $loop->iteration }}</td>
            <td class="px-4 py-3 text-left border">{{ $pemakaian->pelanggan->nama ?? 'Tidak Ada' }}</td>
            <td class="px-4 py-3 text-left border">{{ $pemakaian->tahun }}</td>
            <td class="px-4 py-3 text-left border">
              {{ ['Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni', 'Juli', 'Agustus', 'September', 'Oktober', 'November', 'Desember'][$pemakaian->bulan - 1] }}
            </td>
            <td class="px-4 py-3 text-left border">{{ $pemakaian->meter_awal }}</td>
            <td class="px-4 py-3 text-left border">{{ $pemakaian->meter_akhir }}</td>
            <td class="px-4 py-3 text-left border">{{ $pemakaian->jumlah_pakai }}</td>
            <td class="px-4 py-3 text-left border">Rp
              {{ number_format($pemakaian->biaya_beban_pemakaian, 0, ',', '.') }}
            </td>
            <td class="px-4 py-3 text-left border">Rp {{ number_format($pemakaian->biaya_pemakaian, 0, ',', '.') }}</td>
            <td class="px-4 py-3 text-center border whitespace-nowrap">
              @if($pemakaian->status === 'Lunas')
              <span class="px-3 py-1 text-sm font-semibold text-green-700 bg-green-200 rounded-full">Lunas</span>
              @else
              <span class="px-3 py-1 text-sm font-semibold text-red-700 bg-red-200 rounded-full">Belum Lunas</span>
              @endif
            </td>
          </tr>
          @endforeach
          @endif
        </tbody>
      </table>
    </div>

    <!-- Tambahkan Pagination -->
    <div class="mt-5">
      {{ $pemakaianData->appends(request()->query())->links() }}
    </div>
  </section>
</x-app-layout>