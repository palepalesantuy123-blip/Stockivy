<aside class="w-20 bg-[#F8F9FB] border-r border-base-300 flex flex-col h-full justify-between">

  <div class="flex flex-col items-center w-full">
    <div class="mt-8 mb-4 mx-auto">
      <a href="/">
        <img src="/logo.png" alt="Logo" class="w-15 h-15 object-contain">
      </a>
    </div>

    <ul class="menu menu-md px-2 w-full flex flex-col gap-4 items-center">
      <li><a href="/"><img src="/home.png" alt="Home" class="w-6 h-6"></a></li>
      <li><a href="/category"><img src="/category.png" alt="Category" class="w-6 h-6"></a></li>
      <li><a href="/add"><img src="/box.png" alt="Box" class="w-6 h-6"></a></li>

      @can('view-admin')
      <li class="mt-4 shadow-sm bg-base-300 rounded-lg p-1 text-center">
        <a href="/admin" class="text-error font-semibold text-xs">Admin</a>
      </li>
      @endcan
    </ul>
  </div>

  <div class="mb-12 w-full flex flex-col items-center gap-6">
    @guest
      <a href="/notification"><img src="/bell.png" alt="Notification" class="w-5 h-5"></a>
      <a href="/login"><img src="/people.png" alt="Login" class="w-5 h-5"></a>
    @endguest

    @auth
      <div class="flex flex-col items-center gap-2">
        <span class="text-[10px] font-medium text-gray-400">User</span>
        <form method="POST" action="/logout">
          @csrf
          <button class="btn btn-xs btn-ghost text-error">Out</button>
        </form>
      </div>
    @endauth
  </div>

</aside>
