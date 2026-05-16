<div class="flex min-h-screen">
  <aside class="w-20 bg-[#F8F9FB] border-r border-base-300 flex flex-col">
    <div class="p-6">
      <a href="/" class="text-2xl font-bold tracking-wider">
      <img src="/logo.png" alt="Logo" class="w-10 h-10 aspect-square object-contain inline-block mr-2">
      </a>
    </div>

    <ul class="menu menu-md px-4 flex-1 gap-4">
      <li><a href="/" class="text-2xl font-bold tracking-wider">
      <img src="/home.png" alt="Logo" class="w-6 h-6 inline-block mr-0">
      </a></li>
      <li><a href="/category" class="text-2xl font-bold tracking-wider">
      <img src="/category.png" alt="Logo" class="w-6 h-6 inline-block mr-0">
      </a></li>
      <li><a href="/add" class="text-2xl font-bold tracking-wider">
      <img src="/box.png" alt="Logo" class="w-6 h-6 inline-block mr-0">
      </a></li>

      @can('view-admin')
      <li class="mt-4 shadow-sm bg-base-300 rounded-lg">
        <a href="/admin" class="text-error font-semibold">Admin Panel</a>
      </li>
      @endcan
    </ul>

    <div class="p-4 ml-2">
      @guest
        <div class="p-6 px-2 gap-4">
    <a href="/notification" class="text-2xl font-bold tracking-wider">
      <img src="/bell.png" alt="Logo" class="w-5 h-5 inline-block mr-2 mb-5">
      </a>
    <a href="/login" class="text-2xl font-bold tracking-wider">
      <img src="/people.png" alt="Logo" class="w-5 h-5 inline-block mr-2">
      </a>
        </div>
      @endguest

      @auth
        <div class="flex items-center justify-between">
          <span class="text-sm font-medium truncate">User Mode</span>
          <form method="POST" action="/logout">
            @csrf
            <button class="btn btn-sm btn-ghost text-error">Log Out</button>
          </form>
        </div>
      @endauth
    </div>
  </aside>

  <main class="flex-1 p-10">
  {{ $slot }}
  </main>
</div>
