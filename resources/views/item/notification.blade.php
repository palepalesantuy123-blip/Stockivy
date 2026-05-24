<x-master>
<div class="flex flex-col w-full min-h-screen pb-10 mx-auto px-6 max-w-[1440px]">

  <div class="mt-5 w-full bg-white border-2 border-gray-300 rounded-2xl flex flex-col overflow-hidden min-h-[600px]">
    
    <div class="p-6 flex flex-col gap-4 w-full shrink-0">
      <h1 class="text-xl font-bold text-black tracking-tight">List Notification</h1>
      
      <div class="flex flex-col sm:flex-row gap-3 w-full items-center justify-between">
        <div class="w-full sm:max-w-md h-9 rounded-xl border border-gray-300 flex items-center px-3 gap-2 bg-[#F8F9FB] focus-within:ring-2 focus-within:ring-blue-400 transition-all">
          <img src="/search.png" alt="search" class="w-4 h-4 object-contain opacity-40">
          <input
            type="text"
            placeholder="Search name product"
            class="bg-transparent border-none outline-none text-xs text-gray-700 w-full h-full placeholder-gray-400"
          />
        </div>

        <div class="flex gap-3 w-full sm:w-auto justify-end">
          <div class="h-9 rounded-xl border border-gray-300 flex items-center justify-between px-3 text-xs text-gray-600 bg-[#F8F9FB] min-w-[140px] cursor-pointer">
            <div class="flex items-center gap-2 opacity-50">
              <img src="/schedule.png" alt="calendar" class="w-4 h-4 object-contain">
              <span>Jan 17 2026</span>
            </div>
            <span class="text-[8px] opacity-50 ml-2">▼</span>
          </div>

          <div class="h-9 rounded-xl border border-gray-300 flex items-center justify-between px-3 text-xs text-gray-600 bg-[#F8F9FB] min-w-[100px] cursor-pointer">
            <span class="opacity-50">Sales</span>
            <span class="text-[8px] opacity-50 ml-2">▼</span>
          </div>
        </div>
      </div>
    </div>

    <div class="w-full bg-[#E5E9F0] p-6 flex flex-col gap-4 border-t border-gray-300 h-auto flex-1 pb-12">
      
      <div class="flex flex-col sm:flex-row justify-between items-start sm:items-center gap-4 w-full shrink-0">
        <h2 class="text-base font-bold text-black leading-tight">164 Notification</h2>
        
        <div class="w-full sm:w-64 h-8 rounded-xl border border-gray-300 flex items-center px-3 gap-2 bg-white focus-within:ring-2 focus-within:ring-blue-400 transition-all">
          <img src="/search.png" alt="search" class="w-3.5 h-3.5 object-contain opacity-40">
          <input
            type="text"
            placeholder="Search name product"
            class="bg-transparent border-none outline-none text-xs text-gray-700 w-full h-full placeholder-gray-400"
          />
        </div>
      </div>

      <div class="w-full bg-white border border-gray-300 rounded-xl p-5 flex flex-col gap-5 h-auto">
        
        <div class="flex items-center gap-8 border-b border-gray-200 w-full select-none shrink-0">
          <div class="flex items-center gap-2 pb-2 border-b-2 border-black cursor-pointer group">
            <span class="bg-[#E84E4E] text-white text-[9px] font-bold px-1.5 py-0.5 rounded-full flex items-center justify-center min-w-[18px]">17</span>
            <span class="text-xs font-bold text-black">Ael</span>
          </div>

          <div class="flex items-center gap-2 pb-2 cursor-pointer opacity-50 hover:opacity-100 transition-opacity">
            <span class="bg-gray-400 text-white text-[9px] font-bold px-1.5 py-0.5 rounded-full flex items-center justify-center min-w-[18px]">17</span>
            <span class="text-xs font-bold text-black">Archieve</span>
          </div>

          <div class="flex items-center gap-2 pb-2 cursor-pointer opacity-50 hover:opacity-100 transition-opacity">
            <span class="bg-gray-400 text-white text-[9px] font-bold px-1.5 py-0.5 rounded-full flex items-center justify-center min-w-[18px]">17</span>
            <span class="text-xs font-bold text-black">Favorites</span>
          </div>
        </div>

         <div class="flex flex-col gap-3 w-full">
      
      <div class="w-full h-11 bg-[#E5E9F0] border border-gray-300 rounded-xl flex items-center justify-between px-4 hover:bg-[#D8DEE9] transition-colors">
        <div class="flex items-center gap-3 flex-1 min-w-0">
          <div class="w-1.5 h-1.5 bg-[#E84E4E] rounded-full shrink-0"></div>
          <button class="opacity-40 hover:opacity-100 transition-opacity shrink-0">
            <img src="/star.png" alt="star" class="w-4 h-4 object-contain">
          </button>
          <img src="/mail.png" alt="type" class="w-4 h-4 object-contain opacity-60 shrink-0">
          <p class="text-xs font-semibold text-gray-800 truncate pr-4">I don't fall in love lawlessly.</p>
        </div>
        <div class="flex items-center gap-4 shrink-0">
          <span class="text-[10px] text-gray-500 font-medium">Just now</span>
          <button class="w-6 h-6 bg-[#FADBD8] rounded-md flex items-center justify-center border border-[#F5B7B1] hover:bg-[#F1948A] transition-colors">
            <img src="/delete.png" alt="delete" class="w-3.5 h-3.5 object-contain [filter:invert(27%)_sepia(88%)_saturate(3565%)_hue-rotate(337%)_brightness(93%)_contrast(91%)]">
          </button>
        </div>
      </div>

      <div class="w-full h-11 bg-[#E5E9F0] border border-gray-300 rounded-xl flex items-center justify-between px-4 hover:bg-[#D8DEE9] transition-colors">
        <div class="flex items-center gap-3 flex-1 min-w-0">
          <div class="w-1.5 h-1.5 bg-[#E84E4E] rounded-full shrink-0"></div>
          <button class="opacity-40 hover:opacity-100 transition-opacity shrink-0">
            <img src="/star.png" alt="star" class="w-4 h-4 object-contain">
          </button>
          <img src="/mail.png" alt="type" class="w-4 h-4 object-contain opacity-60 shrink-0">
          <p class="text-xs font-semibold text-gray-800 truncate pr-4">Was lost and you found me.</p>
        </div>
        <div class="flex items-center gap-4 shrink-0">
          <span class="text-[10px] text-gray-500 font-medium">13 mins ago</span>
          <button class="w-6 h-6 bg-[#FADBD8] rounded-md flex items-center justify-center border border-[#F5B7B1] hover:bg-[#F1948A] transition-colors">
            <img src="/delete.png" alt="delete" class="w-3.5 h-3.5 object-contain [filter:invert(27%)_sepia(88%)_saturate(3565%)_hue-rotate(337%)_brightness(93%)_contrast(91%)]">
          </button>
        </div>
      </div>

      <div class="w-full h-11 bg-[#E5E9F0] border border-gray-300 rounded-xl flex items-center justify-between px-4 hover:bg-[#D8DEE9] transition-colors">
        <div class="flex items-center gap-3 flex-1 min-w-0">
          <div class="w-1.5 h-1.5 bg-[#E84E4E] rounded-full shrink-0"></div>
          <button class="opacity-40 hover:opacity-100 transition-opacity shrink-0">
            <img src="/star.png" alt="star" class="w-4 h-4 object-contain">
          </button>
          <img src="/mail.png" alt="type" class="w-4 h-4 object-contain opacity-60 shrink-0">
          <p class="text-xs font-semibold text-gray-800 truncate pr-4">Don't overthink the silent</p>
        </div>
        <div class="flex items-center gap-4 shrink-0">
          <span class="text-[10px] text-gray-500 font-medium">2 days ago</span>
          <button class="w-6 h-6 bg-[#FADBD8] rounded-md flex items-center justify-center border border-[#F5B7B1] hover:bg-[#F1948A] transition-colors">
            <img src="/delete.png" alt="delete" class="w-3.5 h-3.5 object-contain [filter:invert(27%)_sepia(88%)_saturate(3565%)_hue-rotate(337%)_brightness(93%)_contrast(91%)]">
          </button>
        </div>
      </div>

    </div>

    </div>

  </div>
</div>
</x-master>