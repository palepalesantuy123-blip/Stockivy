@props(['title' => 'Stockivy'])
<!doctype html>
<html lang="en" data-theme="lofi">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>{{ $title }}</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    @livewireStyles
  </head>
  <body class="bg-[#ECEFF4] antialiased overflow-hidden">

    <div class="flex h-screen w-full overflow-hidden">

        <x-nav/>

        <main class="flex-1 h-full overflow-y-auto p-10">
          {{ $slot }}
        </main>

    </div>

    @livewireScripts
  </body>
</html>
