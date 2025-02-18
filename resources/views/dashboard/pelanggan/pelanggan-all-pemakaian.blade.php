<x-guest-layout>
  {{-- @foreach($pelanggan->pemakaians as $pemakaian)
      @endforeach --}}
  <div class="max-w-5xl p-6 mx-auto bg-white rounded-lg shadow-lg">
    <h2 class="mb-4 text-2xl font-semibold text-gray-800">Detail Pemakaian Pelanggan</h2>

    <!-- Informasi Pelanggan -->
    <div class="p-4 mb-6 bg-gray-100 rounded-lg">
      <p class="text-lg"><span class="font-bold">Nama:</span> {{ $pelanggan->nama }}</p>
      <p class="text-lg"><span class="font-bold">No Kontrol:</span> {{ $pelanggan->no_kontrol }}</p>
      <p class="text-lg"><span class="font-bold">Alamat:</span> {{ $pelanggan->alamat }}</p>
      <p class="text-lg"><span class="font-bold">No Telp:</span> {{ $pelanggan->no_telp }}</p>
    </div>

    <!-- Grid Cards -->
    <div class="grid grid-cols-1 gap-6 md:grid-cols-2 lg:grid-cols-3">
      @foreach($pelanggan->pemakaians as $pemakaian)
      <div class="p-5 transition bg-white border border-gray-200 rounded-lg shadow-md hover:shadow-lg">
        <h3 class="text-lg font-semibold text-teal-700">{{ $pemakaian->bulan }} {{ $pemakaian->tahun }}</h3>
        <div class="mt-3">
          <p class="text-gray-700"><span class="font-bold">Meter Awal:</span> {{ $pemakaian->meter_awal }}</p>
          <p class="text-gray-700"><span class="font-bold">Meter Akhir:</span> {{ $pemakaian->meter_akhir }}</p>
          <p class="text-gray-700"><span class="font-bold">Jumlah Pakai:</span> {{ $pemakaian->jumlah_pakai }}</p>
          <p class="font-semibold text-green-600"><span class="font-bold">Biaya Beban:</span>
            Rp{{ number_format($pemakaian->biaya_beban_pemakaian, 0, ',', '.') }}</p>
          <p class="font-semibold text-blue-600"><span class="font-bold">Biaya Pemakaian:</span>
            Rp{{ number_format($pemakaian->biaya_pemakaian, 0, ',', '.') }}</p>
        </div>
        <div class="mt-4">
          <span class="px-3 py-1 rounded-full text-white text-sm font-semibold 
                    {{ $pemakaian->status == 'Lunas' ? 'bg-green-500' : 'bg-red-500' }}">
            {{ ucfirst($pemakaian->status) }}
          </span>
        </div>
      </div>
      @endforeach
    </div>

    <!-- Tombol Kembali -->
    <div class="mt-6">
      {{-- <a href="{{ route('pelanggan.pelanggan.all') }}"
      class="px-6 py-2 text-white transition bg-gray-800 rounded-lg hover:bg-gray-600">
      Kembali
      </a> --}}
    </div>
  </div>
</x-guest-layout>