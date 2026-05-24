<aside class="w-20 bg-[#F8F9FB] border-r border-gray-300 flex flex-col h-screen justify-between sticky top-0">

  <div class="flex flex-col items-center w-full">
    <div class="mt-8 mb-6 mx-auto flex justify-center items-center">
      <a href="/">
        <img src="/logo.png" alt="Logo" class="w-12 h-12 object-contain">
      </a>
    </div>

    <ul class="w-full flex flex-col gap-3 items-center px-2">

      <li class="w-full flex justify-center">
        <a href="/"
           class="p-2.5 rounded-xl transition-all duration-200 flex items-center justify-center
                  {{ request()->is('/') ? 'bg-[#E5E9F0] opacity-100 shadow-sm' : 'opacity-50 hover:bg-gray-200/50 hover:opacity-80' }}">
          <img src="/home.png" alt="Home" class="w-5 h-5 object-contain">
        </a>
      </li>

      <li class="w-full flex justify-center">
        <a href="/category"
           class="p-2.5 rounded-xl transition-all duration-200 flex items-center justify-center
                  {{ request()->is('category*') ? 'bg-[#E5E9F0] opacity-100 shadow-sm' : 'opacity-50 hover:bg-gray-200/50 hover:opacity-80' }}">
          <img src="/category.png" alt="Category" class="w-5 h-5 object-contain">
        </a>
      </li>

      <li class="w-full flex justify-center">
        <a href="/add"
           class="p-2.5 rounded-xl transition-all duration-200 flex items-center justify-center
                  {{ request()->is('add*') ? 'bg-[#E5E9F0] opacity-100 shadow-sm' : 'opacity-50 hover:bg-gray-200/50 hover:opacity-80' }}">
          <img src="/box.png" alt="Box" class="w-5 h-5 object-contain">
        </a>
      </li>

      @can('view-admin')
      <li class="w-full px-1 mt-2">
        <a href="/admin"
           class="block w-full py-1.5 rounded-lg border text-center font-bold text-[10px] transition-all
                  {{ request()->is('admin*') ? 'bg-red-50 border-red-300 text-red-600' : 'border-gray-300 text-gray-500 hover:bg-gray-100' }}">
          Admin
        </a>
      </li>
      @endcan

    </ul>
  </div>

  <div class="mb-8 w-full flex flex-col items-center gap-5 px-2">

    <a href="/notification"
       class="p-2 rounded-xl transition-all duration-200 flex items-center justify-center
              {{ request()->is('notification*') ? 'bg-[#E5E9F0] opacity-100' : 'opacity-50 hover:opacity-80' }}">
      <img src="/bell.png" alt="Notification" class="w-5 h-5 object-contain">
    </a>

    @guest
      <a href="/login"
         class="p-2 rounded-xl transition-all duration-200 flex items-center justify-center
                {{ request()->is('login*') ? 'bg-[#E5E9F0] opacity-100' : 'opacity-50 hover:opacity-80' }}">
        <img src="/people.png" alt="Login" class="w-5 h-5 object-contain">
      </a>
    @endguest

    @auth
      <div class="flex flex-col items-center gap-1.5 w-full border-t border-gray-200 pt-4">
        <span class="text-[9px] font-bold text-gray-400 tracking-wider uppercase select-none">User</span>
        <form method="POST" action="/logout" class="w-full flex justify-center">
          @csrf
          <button class="text-[11px] font-bold text-red-500 hover:text-red-700 hover:underline transition-all bg-transparent border-none outline-none cursor-pointer">
            Out
          </button>
        </form>
      </div>
    @endauth

  </div>

</aside>
