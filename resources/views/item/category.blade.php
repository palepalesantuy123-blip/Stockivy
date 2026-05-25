<x-master>

<style>
  /* Menghilangkan icon bawaan browser agar icon lu yang tampil utuh */
  input[type="date"]::-webkit-calendar-picker-indicator,
  input[type="time"]::-webkit-calendar-picker-indicator {
    background: transparent;
    bottom: 0;
    color: transparent;
    cursor: pointer;
    height: auto;
    left: 0;
    position: absolute;
    right: 0;
    top: 0;
    width: auto;
  }
</style>

<div class="flex flex-col w-full pt-6 pb-10 mx-auto px-6 max-w-400 gap-6">

  <form action="{{ request()->url() }}" method="GET" class="w-full">
    <div class="flex flex-col lg:flex-row w-full gap-6">

      <div class="card bg-[#F8F9FB] text-black w-full lg:w-7/12 border-2 border-gray-300 rounded-2xl flex flex-col p-6 gap-4">
        <div class="flex items-center gap-3">
          <div class="bg-[#E5E9F0] p-1.5 rounded-lg shrink-0 flex items-center justify-center w-12 h-12">
            <img src="/sort.png" alt="box" class="w-6 h-6 object-contain">
          </div>
          <div class="flex flex-col text-sm font-bold text-black leading-tight">
            <span>Sort item</span>
            <span>Category</span>
          </div>
        </div>

        <div class="w-full h-8 rounded-xl border border-gray-300 flex items-center px-3 gap-2 focus-within:border-black focus-within:ring-1 focus-within:ring-black transition-all bg-white">
          <img src="/search.png" alt="search_button" class="w-4 h-4 object-contain opacity-50">
          <input
            type="text"
            name="search"
            value="{{ request('search') }}"
            placeholder="Search product"
            class="bg-transparent border-none outline-none text-xs text-gray-700 w-full h-full placeholder-gray-400"
          />
        </div>

        <div class="flex flex-col sm:flex-row gap-3 w-full">
          <div class="flex-1 h-8 rounded-xl border border-gray-300 flex items-center justify-between px-3 text-xs text-gray-600 bg-white gap-2 focus-within:border-black focus-within:ring-1 focus-within:ring-black transition-all">
            <div class="flex items-center gap-1 w-full relative">
              <img src="/schedule.png" alt="schedule_icon" class="w-4 h-4 object-contain opacity-50 shrink-0">
              <input type="date" name="start_date" value="{{ request('start_date') }}" class="bg-transparent border-none outline-none text-[11px] w-full text-gray-700 cursor-pointer">
            </div>
            <div class="flex items-center gap-1 border-l border-gray-300 pl-2 relative w-28">
              <img src="/time.png" alt="clock_icon" class="w-4 h-4 object-contain opacity-40 shrink-0">
              <input type="time" name="start_time" value="{{ request('start_time') }}" class="bg-transparent border-none outline-none text-[11px] w-full text-gray-700 cursor-pointer">
            </div>
          </div>

          <div class="flex-1 h-8 rounded-xl border border-gray-300 flex items-center justify-between px-3 text-xs text-gray-600 bg-white gap-2 focus-within:border-black focus-within:ring-1 focus-within:ring-black transition-all">
            <div class="flex items-center gap-1 w-full relative">
              <img src="/schedule.png" alt="schedule_icon" class="w-4 h-4 object-contain opacity-50 shrink-0">
              <input type="date" name="end_date" value="{{ request('end_date') }}" class="bg-transparent border-none outline-none text-[11px] w-full text-gray-700 cursor-pointer">
            </div>
            <div class="flex items-center gap-1 border-l border-gray-300 pl-2 relative w-28">
              <img src="/time.png" alt="clock_icon" class="w-4 h-4 object-contain opacity-40 shrink-0">
              <input type="time" name="end_time" value="{{ request('end_time') }}" class="bg-transparent border-none outline-none text-[11px] w-full text-gray-700 cursor-pointer">
            </div>
          </div>

          <button type="submit" class="w-30 h-8 rounded-xl bg-[#ECEFF4] border border-gray-300 font-bold text-xs text-gray-600 hover:bg-gray-200 transition-all">
            Search
          </button>
        </div>

        <div class="flex flex-wrap sm:flex-nowrap gap-3 w-full">
          @foreach(['ATK', 'Electronic', 'Tools', 'Others'] as $cat)
            <button type="submit" name="category" value="{{ $cat }}"
              class="flex-1 h-8 rounded-xl border flex items-center justify-center text-xs font-semibold transition-all {{ request('category') == $cat ? 'bg-black text-white border-black' : 'border-gray-300 bg-white text-gray-600 hover:bg-gray-100' }}">
              {{ $cat }}
            </button>
          @endforeach

          <a href="{{ request()->url() }}" class="ml-8 w-30 h-8 rounded-xl bg-[#ECEFF4] border border-gray-300 flex items-center justify-center text-xs text-gray-600 hover:bg-gray-200 font-bold transition-all">
            All
          </a>
        </div>
      </div>

      <div class="w-full lg:w-5/12 flex flex-row gap-4">
        <div class="flex-1 bg-[#F8F9FB] border-2 border-gray-300 rounded-2xl p-6 flex flex-col items-center justify-center text-gray-800 shadow-none">
          <span class="text-2xl font-bold">{{ $totalCategories ?? 0 }}</span>
          <span class="text-[10px] text-gray-400 font-bold uppercase mt-0.5 tracking-wider">Category</span>
        </div>
        <div class="flex-1 bg-[#F8F9FB] border-2 border-gray-300 rounded-2xl p-6 flex flex-col items-center justify-center text-gray-800 shadow-none">
          <span class="text-2xl font-bold">{{ $totalProducts ?? 0 }}</span>
          <span class="text-[10px] text-gray-400 font-bold uppercase mt-0.5 tracking-wider">Product</span>
        </div>
      </div>

    </div>
  </form>

  <div class="flex flex-col lg:flex-row w-full gap-6">

    <div class="mt-5 card bg-[#F8F9FB] text-black w-full lg:w-7/12 border-2 border-gray-300 rounded-2xl flex flex-col p-6 gap-4">
      <div class="text-sm font-bold text-gray-800 border-b pb-2 flex justify-between items-center">
        <span>Item List</span>
        <span class="text-xs font-normal text-gray-400">Showing {{ count($items) }} products</span>
      </div>

      <div id="itemListScroll" class="h-[360px] w-full [direction:rtl] overflow-y-auto scrollbar-thin pl-2">
        <div class="[direction:ltr] space-y-2 pr-2">

          @forelse($items as $item)
            <a href="{{ request()->fullUrlWithQuery(['selected_id' => $item->id]) }}"
               class="p-3 bg-white hover:bg-[#E5E9F0]/60 transition-all border {{ request('selected_id') == $item->id ? 'border-black ring-1 ring-black bg-[#E5E9F0]/30' : 'border-gray-300/70' }} rounded-xl flex items-center justify-between cursor-pointer group block">

              <div class="flex items-center gap-3">
                <div class="w-8 h-8 bg-[#E5E9F0] rounded-lg flex items-center justify-center font-bold text-xs text-gray-600 group-hover:bg-white transition-colors">
                  {{ strtoupper(substr($item->category ?? '??', 0, 2)) }}
                </div>
                <div class="flex flex-col text-left">
                  <span class="text-xs font-bold text-gray-700">{{ $item->name }}</span>
                  <span class="text-[10px] text-gray-400 font-medium">Category: {{ $item->category ?? '-' }}</span>
                </div>
              </div>

              <div class="text-right flex flex-col gap-0.5">
                <span class="text-xs font-bold text-black">Stock: {{ $item->min_quantity }}</span>
                <span class="text-[9px] text-gray-400">ID: #{{ $item->id }}</span>
              </div>
            </a>
          @empty
            <div class="flex flex-col items-center justify-center py-16 gap-2">
              <img src="/box.png" alt="Empty" class="w-12 h-12 opacity-20 object-contain">
              <span class="text-xs text-gray-400 font-medium">No products found matching your criteria.</span>
            </div>
          @endforelse

        </div>
      </div>
    </div>

    <div class="mt-5 w-full lg:w-5/12 bg-[#F8F9FB] border-2 border-gray-300 rounded-2xl p-6 flex flex-col gap-4">
      <div class="text-sm font-bold text-gray-800 border-b pb-2">
        <span>Item Details</span>
      </div>

      @if($selectedItem)
        <div class="p-2 rounded-xl space-y-3 text-xs text-gray-700 flex-1 flex flex-col justify-between">
          <div class="space-y-3">

            <div class="w-full h-40 bg-white border border-gray-300 rounded-xl overflow-hidden flex items-center justify-center relative shadow-inner mb-2">
              @if($selectedItem->image)
                <img src="{{ asset($selectedItem->image) }}" alt="{{ $selectedItem->name }}" class="w-full h-full object-cover">
              @else
                <div class="flex flex-col items-center justify-center gap-1.5 opacity-30 select-none">
                  <img src="/box.png" alt="No Image" class="w-8 h-8 object-contain">
                  <span class="text-[8px] font-bold tracking-wider text-gray-500">NO IMAGE AVAILABLE</span>
                </div>
              @endif
            </div>

            <div>
              <span class="block text-[10px] uppercase font-bold text-gray-400 tracking-wider">Product Name</span>
              <span class="text-sm font-bold text-gray-800 mt-0.5 block">{{ $selectedItem->name }}</span>
            </div>

            <div class="grid grid-cols-2 gap-2 border-t border-gray-300/60 pt-2">
              <div>
                <span class="block text-[10px] uppercase font-bold text-gray-400">ID Product</span>
                <span class="font-semibold text-gray-800 mt-0.5 block">#{{ $selectedItem->id }}</span>
              </div>
              <div>
                <span class="block text-[10px] uppercase font-bold text-gray-400">Category</span>
                <span class="font-semibold text-gray-800 mt-0.5 block">{{ $selectedItem->category }}</span>
              </div>
            </div>

            <div class="grid grid-cols-2 gap-2 border-t border-gray-300/60 pt-2">
              <div>
                <span class="block text-[10px] uppercase font-bold text-gray-400">Min Quantity</span>
                <span class="font-bold text-black mt-0.5 block">{{ $selectedItem->min_quantity }} Pcs</span>
              </div>
              <div>
                <span class="block text-[10px] uppercase font-bold text-gray-400">Max Quantity</span>
                <span class="font-semibold text-gray-600 mt-0.5 block">{{ $selectedItem->max_quantity ?? '-' }} Pcs</span>
              </div>
            </div>

            <div class="border-t border-gray-300/60 pt-2 space-y-1">
              <span class="block text-[10px] uppercase font-bold text-gray-400 tracking-wider">Physical Dimensions</span>
              <div class="grid grid-cols-2 gap-y-1 text-[11px] text-gray-600">
                <span>Weight: <strong class="text-gray-800">{{ $selectedItem->weight ?? '-' }} {{ $selectedItem->weight_unit ?? 'KG' }}</strong></span>
                <span>Length: <strong class="text-gray-800">{{ $selectedItem->length ?? '-' }} {{ $selectedItem->length_unit ?? 'In' }}</strong></span>
                <span>Width: <strong class="text-gray-800">{{ $selectedItem->width ?? '-' }} {{ $selectedItem->width_unit ?? 'In' }}</strong></span>
                <span>Height: <strong class="text-gray-800">{{ $selectedItem->height ?? '-' }} {{ $selectedItem->height_unit ?? 'In' }}</strong></span>
              </div>
            </div>
          </div>

          <div class="border-t border-gray-300/60 pt-3 flex justify-between items-center mt-auto">
            <div>
              <span class="block text-[10px] uppercase font-bold text-gray-400 mb-0.5">Status</span>
              <span class="px-2 py-0.5 rounded text-[10px] font-bold uppercase {{ $selectedItem->status == 'active' || $selectedItem->status == 'publish' ? 'bg-zinc-800 text-white' : 'bg-gray-200 text-gray-600' }}">
                {{ $selectedItem->status ?? 'Draft' }}
              </span>
            </div>
            <div class="flex gap-1.5">
              <a href="{{ route('items.edit', $selectedItem) }}" class="px-3 py-1 bg-white border border-gray-300 hover:bg-gray-100 font-semibold rounded-lg text-[11px] transition-all flex items-center justify-center">
                Edit
              </a>
              <form action="{{ route('items.destroy', $selectedItem) }}" method="POST" class="m-0 p-0">
                @csrf
                @method('DELETE')
                <button type="submit" class="px-3 py-1 bg-red-600 hover:bg-red-700 text-white font-semibold rounded-lg text-[11px] transition-all h-7 select-none">
                  Delete
                </button>
              </form>
            </div>
          </div>
        </div>
      @else
        <div class="text-xs text-gray-400 italic text-center my-auto px-4 py-16 flex-1 flex items-center justify-center">
          Click any product on the left list to see detailed stock information here.
        </div>
      @endif

    </div>

  </div>
</div>

</x-master>
