@props(['route', 'icon', 'title'])

<li class="sidebar-item">
  <a href="{{ route($route) }}" class="sidebar-link gap-3 py-2.5 my-1 text-base flex items-center relative rounded-tr-3xl rounded-br-3xl pl-5 w-full
        {{ request()->routeIs($route) ? 'bg-[#e5f3fb] text-[#43766c] font-semibold' : 'text-gray-500' }}">
    <i class="text-2xl ti {{ $icon }} ps-2"></i>
    <span class="capitalize">{{ $title }}</span>
  </a>
</li>