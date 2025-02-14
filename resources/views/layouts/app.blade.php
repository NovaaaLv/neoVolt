<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="csrf-token" content="{{ csrf_token() }}">

  <title>{{ config('app.name', 'Laravel') }}</title>

  <!-- Fonts -->
  {{-- <link rel="preconnect" href="https://fonts.bunny.net">
  <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" /> --}}


  <!-- Favicon icon-->
  <link rel="shortcut icon" type="image/png" href="./assets/images/logos/favicon.png" />
  <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700&display=swap"
    rel="stylesheet" />
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@tabler/icons-webfont@2.44.0/tabler-icons.min.css" />

  <!-- Scripts -->
  @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="font-sans antialiased bg-surface">
  <div id="main-wrapper" class="flex p-5 xl:pr-0">
    @include('components.ui.partials.sidebar')
    <div class="w-full px-0 page-wrapper xl:px-6">
      <!-- Main Content -->
      <main class="h-full max-w-full">
        <div class="container flex flex-col gap-6 p-0 full-container">
          {{ $slot }}
        </div>
      </main>
      <!-- Main Content End -->
    </div>
  </div>
</body>

</html>