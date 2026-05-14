<div class="flex min-h-screen bg-base-100">
  <aside class="w-20 bg-[#F8F9FB] border-r border-base-300 flex flex-col">
    <div class="p-6">
      <a href="/" class="text-2xl font-bold tracking-wider">
      <img src="/logo.svg" alt="Logo" class="w-8 h-8 inline-block mr-2">
      </a>
    </div>

    <ul class="menu menu-md px-4 flex-1">
      <li><a href="/">Home</a></li>
      <li><a href="/about">About</a></li>
      <li><a href="/contact">Contact</a></li>
      <li><a href="/dream">Dream</a></li>
      <li><a href="/random_test">Random</a></li>

      @can('view-admin')
      <li class="mt-4 shadow-sm bg-base-300 rounded-lg">
        <a href="/admin" class="text-error font-semibold">Admin Panel</a>
      </li>
      @endcan
    </ul>

    <div class="p-4 border-t border-base-300">
      @guest
        <div class="flex flex-col gap-2">
          <a class="btn btn-primary btn-outline w-full" href="/register">Sign Up (是你)</a>
          <a class="btn btn-ghost w-full" href="/login">Login (當你)</a>
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
