@props(['title' => 'Meiyou'])
<!doctype html>
<html lang="en" data-theme="lofi">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>{{ $title }}</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
  </head>
<div class="flex min-h-screen">
    <x-nav/>
    <main class="flex-auto ml-6 mt-2" style="color:black">
      {{ $slot }}
    </main>
</div>
  </body>
</html>
