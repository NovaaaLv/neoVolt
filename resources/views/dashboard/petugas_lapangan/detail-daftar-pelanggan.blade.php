<x-app-layout>
  <section class="grid grid-cols-4 gap-5 p-4 bg-white rounded-lg shadow-primary">
    <div class="col-span-4 mb-2">
      <p class="text-xl font-semibold text-slate-800">Data Pelanggan</p>
    </div>

    <form method="POST" action="{{route('petugas-lapangan.daftar-pelanggan.detail.update-profile', $pelanggan->id)}}"
      class="grid grid-cols-4 col-span-4 gap-5">
      @csrf
      @method('PUT')

      <div class="flex flex-col justify-center w-full px-4 py-2 border rounded-lg border-slate-300">
        <x-ui.content.form.lable title="No Kontrol" />
        <x-ui.content.form.text-placeholder value="{{ $pelanggan->no_kontrol}}" />
      </div>

      <div class="flex flex-col justify-center w-full px-4 py-2 border rounded-lg border-slate-300">
        <x-ui.content.form.lable title="Nama" />
        <x-ui.content.form.text-placeholder value="{{ $pelanggan->nama}}" />
      </div>

      <div class="flex flex-col justify-center w-full px-4 py-2 border rounded-lg border-slate-300">
        <x-ui.content.form.lable title="Alamat" />
        <x-ui.content.form.text-placeholder value="{{ $pelanggan->alamat}}" />
      </div>

      <div class="flex flex-col justify-center w-full px-4 py-2 border rounded-lg border-slate-300">
        <x-ui.content.form.lable title="No Telp" />
        <x-ui.content.form.input-second-field title="No Telp" type="number" id="no_telp" name="no_telp"
          value="{{ old('no_telp') ?? $pelanggan->no_telp }}" placeholder="+62" />
      </div>

      <div class="flex flex-col justify-center w-full px-4 py-1 border rounded-lg border-slate-300">
        <x-ui.content.form.lable title="Jenis Pelanggan" />
        <select id="tarif_id" name="tarif_id"
          class="w-full px-4 py-2 mt-1 text-sm border rounded-lg border-slate-400 focus:outline-none">
          <option value="">-- Pilih --</option>
          @foreach ($tarifs as $tarif)
          <option value="{{$tarif->id}}" {{ $pelanggan->tarif_id == $tarif->id ? 'selected' : '' }}>
            {{$tarif->jenis_plg}}
          </option>
          @endforeach
        </select>
      </div>

      <div class="flex items-end">
        <button id="update-button" type="submit"
          class="hidden px-4 py-1 text-white bg-teal-700 border border-teal-700 rounded-lg transition-3s hover:bg-transparent hover:text-teal-700">
          Update
        </button>
      </div>

    </form>



    <div class="col-span-4">
      @error(['tarif_id','no_telp'])
      <p class="mt-1 text-sm text-red-500">{{ $message }}</p>
      @enderror
    </div>

    {{--  --}}
    <div action="" class="relative grid w-full grid-cols-4 col-span-4 gap-5">
      @if ($pelanggan->tarif === null)
      <div class="absolute inset-0 px-4 rounded-xl backdrop-blur-[2px] flex items-center justify-center bg-black/20">
        <p class="font-semibold text-slate-700">Mohon lengkapi data diri di atas terlebih dahulu</p>
      </div>
      @endif
      <div class="col-span-4 mb-2">
        <p class="text-xl font-semibold text-slate-800">Data Pemakaian</p>
      </div>
      <form action="{{ route('petugas-lapangan.daftar-pelanggan.detail.tambah-pemakaian', $pelanggan->id) }}"
        method="POST" class="grid grid-cols-4 col-span-4 gap-5">
        @csrf
        <div class="flex flex-col justify-center w-full px-4 py-2 border rounded-lg border-slate-300">
          <x-ui.content.form.lable title="Tahun" />
          <select name="tahun"
            class="w-full px-4 py-2 mt-1 text-sm border rounded-lg border-slate-400 focus:outline-none">
            <option value="">-- Pilih --</option>
            @for ($year = now()->year; $year >= now()->year - 3; $year--)
            <option value="{{ $year }}">{{ $year }}</option>
            @endfor
          </select>
        </div>
        <div class="flex flex-col justify-center w-full px-4 py-2 border rounded-lg border-slate-300">
          <x-ui.content.form.lable title="Bulan" />
          <select name="bulan"
            class="w-full px-4 py-2 mt-1 text-sm border rounded-lg border-slate-400 focus:outline-none">
            <option value="">-- Pilih --</option>
            @foreach ([
            '1' => 'January', '2' => 'February', '3' => 'March', '4' => 'April',
            '5' => 'May', '6' => 'June', '7' => 'July', '8' => 'August',
            '9' => 'September', '10' => 'October', '11' => 'November', '12' => 'December'
            ] as $value => $month)
            <option value="{{ $value }}">{{ $month }}</option>
            @endforeach
          </select>
        </div>
        <div class="flex flex-col justify-center w-full px-4 py-2 border rounded-lg border-slate-300">
          <x-ui.content.form.lable title="Meter Awal" />
          <x-ui.content.form.input-second-field title="Meter Awal" type="number" id="meter_awal" name="meter_awal"
            placeholder="--" />
        </div>
        <div class="flex flex-col justify-center w-full px-4 py-2 border rounded-lg border-slate-300">
          <x-ui.content.form.lable title="Meter Akhir" />
          <x-ui.content.form.input-second-field title="Meter Akhir" type="number" id="meter_akhir" name="meter_akhir"
            placeholder="--" />
        </div>
        <div class="flex items-end">
          <button type="submit"
            class="px-4 py-1 text-white bg-teal-700 border border-teal-700 rounded-lg transition-3s hover:bg-transparent hover:text-teal-700">
            Submit
          </button>
        </div>
      </form>
    </div>
  </section>
</x-app-layout>


<script>
  document.addEventListener("DOMContentLoaded", function () {
          const noTelpInput = document.getElementById("no_telp");
          const tarifSelect = document.getElementById("tarif_id");
          const updateButton = document.getElementById("update-button");

          const initialNoTelp = noTelpInput.value;
          const initialTarifId = tarifSelect.value;
  
          function checkChanges() {
              if (noTelpInput.value !== initialNoTelp || tarifSelect.value !== initialTarifId) {
                  updateButton.classList.remove("hidden"); 
              } else {
                  updateButton.classList.add("hidden"); 
              }
          }
  
          noTelpInput.addEventListener("input", checkChanges);
          tarifSelect.addEventListener("change", checkChanges);


          const bulanSelect = document.querySelector('select[name="bulan"]');
          const tahunSelect = document.querySelector('select[name="tahun"]');
          const meterAwalInput = document.getElementById("meter_awal");
          
          bulanSelect.addEventListener("change", async function () {
          const bulan = this.value;
          const tahun = tahunSelect.value;
          const pelangganId = "{{ $pelanggan->id }}";
          
          if (!bulan || !tahun) return;
          
          try {
          const response = await fetch(`/get-previous-usage/${pelangganId}/${tahun}/${bulan}`);
          const data = await response.json();
          
          if (data.success) {
          meterAwalInput.value = data.jumlah_pakai ?? 0;
          } else {
          meterAwalInput.value = 0;
          }
          } catch (error) {
          console.error("Error fetching data:", error);
          }
          });
      });
</script>