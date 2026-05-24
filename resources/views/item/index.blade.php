<x-master>
<div class="flex flex-col w-full pb-10 mx-auto px-6 max-w-400">

  <div class="mt-5 card bg-[#E5E9F0] text-black w-380 h-40 border-2 border-gray-300 rounded-2xl flex items-center justify-center p-6">
    <div class="flex items-center justify-between w-full px-4">
      <div class="flex items-center gap-4">
        <img src="{{ $user_profile }}" class="w-20 h-20 rounded-full object-cover" />
        <div>
          <p class="font-bold text-lg leading-tight">{{ $person }}</p>
          <p class="text-sm text-gray-400 mt-1">{{ $description }}</p>
        </div>
      </div>

      <div class="w-1 h-28 bg-black rounded-2xl mx-6"></div>

      <div class="flex-1 flex gap-4">
        <div class="card bg-[#F8F9FB] p-2 flex flex-row items-center gap-4 flex-1 h-24 rounded-2xl border border-gray-300 pl-6">
          <div class="bg-[#E5E9F0] p-1.5 rounded-lg shrink-0 flex items-center justify-center w-12 h-12">
            <img src="/category.png" alt="Logo" class="w-6 h-6 object-contain">
          </div>
          <div class="flex flex-col">
            <span class="text-base font-bold text-black leading-none">
              {{ $totalCategory }}
            </span>
            <span class="text-[10px] text-gray-500 font-semibold mt-1">Category</span>
          </div>
        </div>

        <div class="card bg-[#F8F9FB] p-2 flex flex-row items-center gap-4 flex-1 h-24 rounded-2xl border border-gray-300 pl-6">
          <div class="bg-[#E5E9F0] p-1.5 rounded-lg shrink-0 flex items-center justify-center w-12 h-12">
            <img src="/box.png" alt="Logo" class="w-6 h-6 object-contain">
          </div>
          <div class="flex flex-col">
            <span class="text-base font-bold text-black leading-none">
              {{ $totalProduct }}
            </span>
            <span class="text-[10px] text-gray-500 font-semibold mt-1">Product</span>
          </div>
        </div>
      </div>
    </div>
  </div>

  <div class="flex flex-row items-stretch gap-6 mt-6 w-380 mx-auto mr-20">
    <div class="flex-1 shrink-0">
        @include('components.chartbar')
    </div>

    <div class="w-120 mt-6 ml-5 bg-white p-6 h-131 rounded-2xl border-2 border-gray-300 shadow-sm shrink-0">
        @include('components.list')
    </div>
  </div>

  <div class="flex flex-row items-stretch gap-6 mt-6 w-380 mx-auto mr-20">
    <div class="w-200 bg-white p-6 rounded-2xl border-2 border-gray-300 shadow-sm shrink-0 mt-5">
        @include('components.recent')
    </div>

    <div class="w-170 ml-5 rounded-2xl shrink-0 mt-5">
        @include('components.storage')
    </div>
  </div>

</div>
</x-master>
