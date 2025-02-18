<x-guest-layout>
  <div class="w-full h-screen flex justify-center items-center">
    <div class="w-full max-w-md p-6 bg-white rounded-lg shadow-md">
      <h2 class="text-2xl font-bold text-center text-gray-700">Login</h2>

      <!-- Session Status -->
      @if (session('status'))
      <div class="p-4 mb-4 text-sm text-green-700 bg-green-100 rounded-lg">
        {{ session('status') }}
      </div>
      @endif

      <form method="POST" action="{{ route('login') }}">
        @csrf

        <!-- Email Address -->
        <div class="mt-4">
          <label for="email" class="block text-sm font-medium text-gray-700">Email</label>
          <input id="email" type="email" name="email" value="{{ old('email') }}" required autofocus
            autocomplete="username"
            class="block w-full mt-1 p-2 border border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500">
          @error('email')
          <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
          @enderror
        </div>

        <!-- Password -->
        <div class="mt-4">
          <label for="password" class="block text-sm font-medium text-gray-700">Password</label>
          <input id="password" type="password" name="password" required autocomplete="current-password"
            class="block w-full mt-1 p-2 border border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500">
          @error('password')
          <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
          @enderror
        </div>

        <!-- Remember Me -->
        <div class="flex items-center mt-4">
          <input id="remember_me" type="checkbox" name="remember"
            class="w-4 h-4 text-indigo-600 border-gray-300 rounded focus:ring-indigo-500">
          <label for="remember_me" class="ml-2 text-sm text-gray-600">Remember me</label>
        </div>

        <div class="flex items-center justify-between mt-4">
          <div></div>

          <button type="submit" class="px-4 py-2 text-white bg-indigo-600 rounded-md hover:bg-indigo-700">Log
            in</button>
        </div>
      </form>
    </div>
  </div>
</x-guest-layout>