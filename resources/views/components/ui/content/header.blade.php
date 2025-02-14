@props(['username','title'])

<header class="w-full px-6 py-4 text-sm bg-white rounded-lg shadow-primary">
  <nav class="flex items-center justify-between w-full" aria-label="Global">
    <div class="">
      <span>{{$title}}</span>
    </div>
    <div class="flex items-center gap-4">
      <div x-data="{ open: false }" class="relative inline-flex">
        <button @click="open = !open" class="relative align-middle rounded-full cursor-pointer flex items-center gap-2">
          <img class="object-cover rounded-full w-9 h-9" src="{{asset('build/assets/icons/user_circle.png')}}" alt=""
            aria-hidden="true" />
          <span class="mr-1 text-slate-900">{{$username}}</span>
          <i :class="open ? 'ti ti-chevron-up' : 'ti ti-chevron-down'"></i>
        </button>
        <div x-show="open" @click.outside="open = false" x-transition.opacity.scale.90.duration.200ms
          class="absolute right-0 top-8 mt-2 w-48 bg-white rounded-lg shadow-lg overflow-hidden z-50">
          <a href="#" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">Profile</a>
          <a href="#" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">Settings</a>
          <form method="POST" action="{{ route('logout') }}">
            @csrf

            <x-dropdown-link :href="route('logout')" onclick="event.preventDefault();
            this.closest('form').submit();">
              {{ __('Log Out') }}
            </x-dropdown-link>
          </form>
        </div>
      </div>
    </div>
  </nav>
</header>