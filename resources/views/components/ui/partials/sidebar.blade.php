<aside id="application-sidebar-brand"
  class="hs-overlay hs-overlay-open:translate-x-0 -translate-x-full transform hidden xl:block xl:translate-x-0 xl:end-auto xl:bottom-0 fixed xl:top-5 xl:left-auto top-0 left-0 with-vertical h-screen z-[999] shrink-0 w-[270px] shadow-md xl:rounded-md rounded-none bg-white left-sidebar transition-all duration-300">
  <!-- ---------------------------------- -->
  <!-- Start Vertical Layout Sidebar -->
  <!-- ---------------------------------- -->
  <div class="flex items-center gap-2 mt-3">
    <div class="w-[70px] h-[70px]">
      <img src="{{ asset('build/assets/icons/logo.png') }}" alt="Logo" class="w-full h-full">
    </div>
    <p class="text-xl font-bold leading-4 text-slate-900">NeoVolt</p>
  </div>
  <div class="overflow-y-auto scrollbar-none h-4/5" data-simplebar="">
    <nav class="flex flex-col w-full pr-5 mt-5 sidebar-nav">
      <ul id="sidebarnav" class="text-sm text-gray-600">
        <x-ui.sidebar.header title="home" />

        <x-ui.sidebar.item route="admin.dashboard" icon="ti-layout-dashboard" title="Dashboard" />
        <x-ui.sidebar.item route="admin.dashboard-add-petugas" icon="ti-user-plus" title="Tambah petugas" />
        <x-ui.sidebar.item route="admin.dashboard-add-petugas" icon="ti-bolt" title="Tambah Tarif" />

        <x-ui.sidebar.header title="petugas" />

        <x-ui.sidebar.item route="petugas.pembayaran" icon="ti-wallet" title="transaksi pelanggan" />

        <x-ui.sidebar.header title="petugas lapangan" />

        <x-ui.sidebar.item route="petugas-lapangan.daftar-pelanggan" icon="ti-notebook" title="daftar pelanggan" />
      </ul>
    </nav>
  </div>
  <!-- </aside> -->
</aside>