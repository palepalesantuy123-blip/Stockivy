<x-master>
<div class="flex justify-center mt-5 card bg-[#E5E9F0] text-black w-380 h-40 border-2 border-gray-300 rounded-2xl">
  <div class="card-body items-center text-center">
    </div>

  <div class="ml-15 mb-11 flex items-center gap-6">
    <div class="flex items-center gap-4">
      <img src="{{ $user_profile }}" class="w-20 h-20 rounded-full" />
      <div class="p-6">
        <p class="font-bold">{{ $person }}</p>
        <p class="text-sm text-center text-gray-400">{{ $desciption }}</p>
      </div>
    </div>

    <div class="w-1 h-30 bg-black rounded-2xl"></div>

    <div class="flex-1 justify-center ml-10 flex gap-4">
      <div class="card bg-[#F8F9FB] p-2 flex flex-row items-center gap-2 flex-1 h-25 rounded-2xl border border-gray-300">
        <div class="bg-[#E5E9F0] p-1.5 rounded-lg shrink-0 flex items-center justify-center w-12 h-12 ml-5">
          <img src="/category.png" alt="Logo" class="w-6 h-6 object-contain">
        </div>
        <div class="flex flex-col">
          <span class="text-sm font-bold text-black leading-none">17</span>
          <span class="text-[10px] text-gray-500 font-semibold">Category</span>
        </div>
      </div>

      <div class="card bg-[#F8F9FB] p-2 flex flex-row items-center gap-2 flex-1 h-25 rounded-2xl border border-gray-300 mr-15">
        <div class="bg-[#E5E9F0] p-1.5 rounded-lg shrink-0 flex items-center justify-center w-12 h-12 ml-5">
          <img src="/box.png" alt="Logo" class="w-6 h-6 object-contain">
        </div>
        <div class="flex flex-col">
          <span class="text-sm font-bold text-black leading-none">164</span>
          <span class="text-[10px] text-gray-500 font-semibold">Product</span>
        </div>
      </div>
    </div>
  </div>
</div>
<div class="flex flex-row items-start gap-6 mt-6 w-380">

    <div class="flex-1 shrink-0">
        @include('components.chartbar')
    </div>

    <div class="mt-6 ml-6 h-130 w-120 bg-[#F8F9FB] p-4 rounded-2xl border-2 border-gray-300 shadow-sm shrink-0">
        @include('components.list')
    </div>

</div>
</div>
</x-master>
</script>
