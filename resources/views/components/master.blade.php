@props(['title' => 'Stockivy'])
<!doctype html>
<html lang="en" data-theme="lofi">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>{{ $title }}</title>
    <link href="https://fonts.googleapis.com/css?family=Inter&display=swap" rel="stylesheet">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
  </head>
  <body>
<div class="flex min-h-screen w-full bg-[#ECEFF4]">
    <x-nav/>
    <main class="flex-auto ml-6 mt-2" style="color:black">
      {{ $slot }}
    </main>
</div>
  </body>
</html>
