<x-app-layout>
  <section class="w-full p-6 rounded-lg shadow-md bg-white">
    <div class="flex items-center justify-between mb-5">
      <h2 class="text-xl font-semibold text-gray-800"> Daftar Petugas</h2>
      <a href="{{ route('admin.dashboard-add-petugas') }}"
        class="px-5 py-2 rounded-lg bg-teal-600 text-white font-medium border border-teal-600 transition-all duration-300 hover:bg-transparent hover:text-teal-600">
        Tambah Petugas
      </a>
    </div>

    @if ($petugas->isEmpty())
    <p class="text-gray-500 text-center py-6">😔 Tidak ada petugas yang tersedia.</p>
    @else
    <div class="overflow-x-auto">
      <table class="w-full border-collapse rounded-lg shadow-md">
        <thead class="bg-teal-600 text-white">
          <tr>
            <th class="border border-gray-300 p-3">No</th>
            <th class="border border-gray-300 p-3">Nama</th>
            <th class="border border-gray-300 p-3">Email</th>
            <th class="border border-gray-300 p-3">Role</th>
          </tr>
        </thead>
        <tbody>
          @foreach ($petugas as $index => $user)
          <tr class="text-center bg-white transition-all duration-300 hover:bg-teal-100">
            <td class="border border-gray-300 p-3">{{ $petugas->firstItem() + $index }}</td>
            <td class="border border-gray-300 p-3">{{ $user->name }}</td>
            <td class="border border-gray-300 p-3">{{ $user->email }}</td>
            <td class="border border-gray-300 p-3 capitalize text-teal-700 font-semibold">
              {{ ucfirst(str_replace('_', ' ', $user->role)) }}
            </td>
          </tr>
          @endforeach
        </tbody>
      </table>
    </div>

    <!-- Pagination -->
    <div class="mt-6 flex justify-center">
      {{ $petugas->links('pagination::tailwind') }}
    </div>
    @endif
  </section>
</x-app-layout>