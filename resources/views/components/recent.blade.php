<div class="flex items-center gap-3">
  <div class="bg-[#E5E9F0] p-1.5 rounded-lg shrink-0 flex items-center justify-center w-12 h-12 ml-3 mt-3">
    <img src="/clock.png" alt="box" class="w-6 h-6 object-contain">
  </div>
  <div class="flex flex-col mt-3 text-sm font-bold text-black">
    <span>Recent</span>
    <span>Activity</span>
  </div>
</div>
<div class="bg-[#E5E9F0] w-181 h-8 rounded-xl mt-4 mx-auto border border-gray-300 flex items-center px-3 gap-2Focus-within:ring-2 focus-within:ring-blue-400">
  <img src="/search.png" alt="search_button" class="w-4 h-4 object-contain opacity-50">
  <input
    type="text"
    placeholder="Search last activity"
    class="ml-1 bg-transparent border-none outline-none text-xs text-gray-700 w-full h-full placeholder-gray-400"
  />
</div>
<div class="ml-4 mt-5 h-90 w-full [direction:rtl] overflow-y-scroll pl-2
            scrollbar
            scrollbar-thin
            scrollbar-thumb-gray-300
            scrollbar-track-transparent">

  <div class="[direction:ltr] space-y-2 mr-8">
@foreach($items as $item)
      <div class="p-2 bg-[#E5E9F0] text-xs font-semibold text-gray-800 rounded-lg shadow-sm hover:bg-gray-200 transition-colors">
        {{ $item->name }}
      </div>
    @endforeach

    @if($items->isEmpty())
      <div class="p-2 text-xs text-gray-400 text-center">
        No items available
      </div>
    @endif
  </div>
</div>

