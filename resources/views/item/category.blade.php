<x-master>
<div class="flex flex-col lg:flex-row w-full pb-5 mx-auto px-6 max-w-400 gap-6">
  <div class="mt-5 card bg-[#F8F9FB] text-black w-full border-2 border-gray-300 rounded-2xl flex flex-col p-6 gap-4">

    <div class="flex items-center gap-3">
      <div class="bg-[#E5E9F0] p-1.5 rounded-lg shrink-0 flex items-center justify-center w-12 h-12">
        <img src="/sort.png" alt="box" class="w-6 h-6 object-contain">
      </div>
      <div class="flex flex-col text-sm font-bold text-black leading-tight">
        <span>Sort item</span>
        <span>Category</span>
      </div>
    </div>

    <div class="w-full h-8 rounded-xl border border-gray-300 flex items-center px-3 gap-2 focus-within:ring-2 focus-within:ring-blue-400 transition-all">
      <img src="/search.png" alt="search_button" class="w-4 h-4 object-contain opacity-50">
      <input
        type="text"
        placeholder="Search product"
        class="bg-transparent border-none outline-none text-xs text-gray-700 w-full h-full placeholder-gray-400"
      />
    </div>
    <div class="flex flex-col sm:flex-row gap-3 w-full">
      <div class="flex-1 h-8 rounded-xl border border-gray-300 flex items-center justify-between px-3 text-xs text-gray-600">
        <div class="flex items-center gap-2">
        <img src="/schedule.png" alt="schedule_icon" class="w-4 h-4 object-contain opacity-50">
          <span class="opacity-50">{{ $date }}</span>
        </div>
        <div class="flex items-center gap-2">
        <img src="/time.png" alt="clock_icon" class="w-4 h-4 object-contain opacity-30">
          <span class="opacity-50">{{ $time }}</span>
        </div>
      </div>
      <div class="flex-1 h-8 rounded-xl border border-gray-300 flex items-center justify-between px-3 text-xs text-gray-600">
        <div class="flex items-center gap-2">
        <img src="/schedule.png" alt="schedule_icon" class="w-4 h-4 object-contain opacity-50">
          <span class="opacity-50">{{ $date }}</span>
        </div>
        <div class="flex items-center gap-2">
        <img src="/time.png" alt="clock_icon" class="w-4 h-4 object-contain opacity-30">
          <span class="opacity-50">{{ $time }}</span>
        </div>
      </div>
     <div class="w-30 h-8 rounded-xl bg-[#ECEFF4] border border-gray-300 flex items-center justify-center px-3 text-xs text-gray-600">
        <div class="flex items-center gap-2">
        <button class="opacity-50 w-full h-full text-center">Search</button>
        </div>
      </div>
    </div>

    <div class="flex flex-col sm:flex-row gap-3 w-full">
      <div class="flex-1 h-8 rounded-xl border border-gray-300 flex items-center justify-center px-3 text-xs text-gray-600">
        <div class="flex items-center gap-2">
          <span class="opacity-50">ATK</span>
        </div>
      </div>
      <div class="flex-1 h-8 rounded-xl border border-gray-300 flex items-center justify-center px-3 text-xs text-gray-600">
        <div class="flex items-center gap-2">
          <span class="opacity-50">Electronic</span>
        </div>
      </div>
      <div class="flex-1 h-8 rounded-xl border border-gray-300 flex items-center justify-center px-3 text-xs text-gray-600">
        <div class="flex items-center gap-2">
          <span class="opacity-50">....</span>
        </div>
      </div>
      <div class="flex-1 h-8 rounded-xl border border-gray-300 flex items-center justify-center px-3 text-xs text-gray-600">
        <div class="flex items-center gap-2">
          <span class="opacity-50">....</span>
        </div>
      </div>
     <div class="ml-8 w-30 h-8 rounded-xl bg-[#ECEFF4] border border-gray-300 flex items-center justify-center px-3 text-xs text-gray-600">
        <div class="flex items-center gap-2">
        <button class="opacity-50 w-full h-full text-center">All</button>
        </div>
      </div>
    </div>
  </div>

    <div class="mr-10 ml-5 mt-5 w-full bg-[#F8F9FB] border-2 border-gray-300 rounded-2xl p-6 flex items-center justify-center gap-8">
      <div class="w-80 h-24 bg-[#E5E9F0] border border-gray-300 rounded-xl flex items-center justify-center text-xl font-bold text-gray-800">
        17
      </div>
      <div class="w-80 h-24 bg-[#E5E9F0] border border-gray-300 rounded-xl flex items-center justify-center text-xl font-bold text-gray-800">
        164
      </div>
    </div>
</div>

<div>
@include('components.item')
</div>

</x-master>
