<x-app-layout>
  @if (session('success'))
  <div class="w-full p-3 mb-4 text-white bg-teal-700 rounded-lg shadow-primary">
    {{ session('success') }}
  </div>
  @endif

  <section class="w-full p-6 bg-white rounded-lg shadow-md">
    <div class="flex items-center justify-between mb-5">
      <h2 class="text-xl font-semibold text-gray-800"> Daftar Petugas</h2>
      <a href="{{ route('admin.dashboard-add-petugas') }}"
        class="px-5 py-2 font-medium text-white transition-all duration-300 bg-teal-600 border border-teal-600 rounded-lg hover:bg-transparent hover:text-teal-600">
        Tambah Petugas
      </a>
    </div>

    @if ($petugas->isEmpty())
    <p class="py-6 text-center text-gray-500">😔 Tidak ada petugas yang tersedia.</p>
    @else
    <div class="overflow-x-auto">
      <table class="w-full border-collapse rounded-lg shadow-md">
        <thead class="text-white bg-teal-600">
          <tr>
            <th class="p-3 border border-gray-300">No</th>
            <th class="p-3 border border-gray-300">Nama</th>
            <th class="p-3 border border-gray-300">Email</th>
            <th class="p-3 border border-gray-300">Role</th>
            <th class="p-3 border border-gray-300">Aksi</th>
          </tr>
        </thead>
        <tbody>
          @foreach ($petugas as $index => $user)
          <tr class="z-10 text-center transition-all duration-300 bg-white hover:bg-teal-100">
            <td class="p-3 border border-gray-300">{{ $petugas->firstItem() + $index }}</td>
            <td class="p-3 border border-gray-300">{{ $user->name }}</td>
            <td class="p-3 border border-gray-300">{{ $user->email }}</td>
            <td class="p-3 font-semibold text-teal-700 capitalize border border-gray-300">
              {{ ucfirst(str_replace('_', ' ', $user->role)) }}
            </td>
            <td class="relative flex items-center justify-center p-3 border border-gray-300" x-data="{ open: false }">
              <!-- Tombol Tiga Titik -->
              <button @click="open = !open"
                class="w-[35px] h-[35px] rounded-full flex items-center justify-center hover:bg-teal-200 transition-all duration-300">
                <i class="text-xl ti-dots ti"></i>
              </button>

              <!-- Dropdown Aksi -->
              <div x-show="open" @click.away="open = false"
                class="fixed z-50 mt-20 bg-white border border-gray-300 rounded-lg shadow-lg right-12 w-36"
                x-transition:enter="transition ease-out duration-200" x-transition:enter-start="opacity-0 scale-90"
                x-transition:enter-end="opacity-100 scale-100" x-transition:leave="transition ease-in duration-100"
                x-transition:leave-start="opacity-100 scale-100" x-transition:leave-end="opacity-0 scale-90">
                <a href="{{ route('admin.edit-petugas', $user->id) }}"
                  class="flex items-center gap-2 px-5 py-1 text-sm font-semibold uppercase text-slate-800/70">
                  <i class="text-lg text-yellow-500 ti ti-pencil"></i>
                  Update
                </a>
                <form action="{{ route('admin.delete-petugas', $user->id) }}" method="POST"
                  onsubmit="return confirm('Apakah Anda yakin ingin menghapus petugas ini?');">
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

    <!-- Pagination -->
    <div class="flex justify-center mt-6">
      {{ $petugas->links('pagination::tailwind') }}
    </div>
    @endif
  </section>
</x-app-layout>