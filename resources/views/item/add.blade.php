<x-master>

<form action="{{ route('items.store') }}" method="POST" enctype="multipart/form-data">
  @csrf

  <div class="flex flex-col w-full pb-5 mx-auto px-6 max-w-400 gap-6">

    <div class="mt-5 card bg-[#F8F9FB] text-black w-full border-2 border-gray-300 rounded-2xl flex flex-col p-6 gap-6">
      <div class="flex items-center gap-3">
        <div class="bg-[#E5E9F0] p-1.5 rounded-lg shrink-0 flex items-center justify-center w-12 h-12">
          <img src="/box.png" alt="box" class="w-6 h-6 object-contain">
        </div>
        <div class="flex flex-col text-sm font-bold text-black leading-tight">
          <span>Add</span>
          <span>Product</span>
        </div>
      </div>

      <div class="flex flex-col md:flex-row gap-6 items-stretch w-full">
        <div class="flex-1 flex flex-col gap-3">
          <div class="flex flex-col gap-1">
            <label class="text-xs font-bold text-gray-700">Product name</label>
            <div class="w-full h-8 rounded-xl border border-gray-300 flex items-center px-3 bg-[#E5E9F0]/40">
              <input
                type="text"
                name="name"
                placeholder="Insert product name"
                class="bg-transparent border-none outline-none text-xs text-gray-700 w-full h-full placeholder-gray-400"
              />
            </div>
          </div>

          <div class="flex flex-col sm:flex-row gap-3 w-full">
            <div class="flex-1 flex flex-col gap-1">
              <label class="text-xs font-bold text-gray-700">Category</label>
              <div class="w-full h-8 rounded-xl border border-gray-300 flex items-center px-3 bg-[#E5E9F0]/40">
                <input
                  type="text"
                  name="category"
                  placeholder="Insert category"
                  class="bg-transparent border-none outline-none text-xs text-gray-700 w-full h-full placeholder-gray-400"
                />
              </div>
            </div>

            <div class="flex-1 flex flex-col gap-1">
              <label class="text-xs font-bold text-gray-700">Sub-category</label>
              <div class="w-full h-8 rounded-xl border border-gray-300 flex items-center px-3 bg-[#E5E9F0]/40">
                <input
                  type="text"
                  name="sub_category"
                  placeholder="Insert sub-category"
                  class="bg-transparent border-none outline-none text-xs text-gray-700 w-full h-full placeholder-gray-400"
                />
              </div>
            </div>
          </div>

          <div class="flex flex-col sm:flex-row gap-3 w-full">
            <div class="flex-1 flex flex-col gap-1">
              <label class="text-xs font-bold text-gray-700">Min quantity in stock</label>
              <div class="w-full h-8 rounded-xl border border-gray-300 flex items-center justify-between px-3 text-xs text-gray-600 bg-[#E5E9F0]/40">
                <input
                  type="number"
                  name="min_quantity"
                  placeholder="Min quantity"
                  class="bg-transparent border-none outline-none text-xs text-gray-700 w-full h-full placeholder-gray-400"
                />
              </div>
            </div>

            <div class="flex-1 flex flex-col gap-1">
              <label class="text-xs font-bold text-gray-700">Max quantity in stock</label>
              <div class="w-full h-8 rounded-xl border border-gray-300 flex items-center justify-between px-3 text-xs text-gray-600 bg-[#E5E9F0]/40">
                <input
                  type="number"
                  name="max_quantity"
                  placeholder="Max quantity"
                  class="bg-transparent border-none outline-none text-xs text-gray-700 w-full h-full placeholder-gray-400"
                />
              </div>
            </div>
          </div>
        </div>

        <label class="w-full md:w-52 border border-gray-300 rounded-2xl p-4 flex flex-col items-center justify-center text-center cursor-pointer hover:bg-gray-50/50 transition-colors gap-2 select-none">
          <input type="file" name="images[]" class="hidden" accept="image/*" multiple />
          <div class="w-14 h-14 flex items-center justify-center opacity-75">
            <img src="/drag.png" alt="Upload" class="w-full h-full object-contain">
          </div>

          <div class="text-[10px] leading-tight text-gray-500">
            <p class="font-bold text-[#365194]">Drag image(s) here,</p>
            <p class="text-gray-400 my-0.5">or</p>
            <p class="font-bold text-[#365194] flex items-center justify-center gap-1">Browse image</p>
          </div>
        </label>
      </div>
    </div>

    <div class="card bg-[#F8F9FB] text-black w-full border-2 border-gray-300 rounded-2xl flex flex-col p-6 gap-4">
      <div class="flex flex-col sm:flex-row gap-x-6 gap-y-3 w-full">
        <div class="flex-1 flex flex-col gap-1 text-right">
          <label class="text-xs font-bold text-gray-700 text-left">Weight</label>
          <div class="w-full h-8 rounded-xl border border-gray-300 flex items-center justify-between px-3 bg-[#E5E9F0]/40">
            <input
              type="text"
              name="weight"
              placeholder="Insert product weight"
              class="bg-transparent border-none outline-none text-xs text-gray-700 w-full h-full placeholder-gray-400"
            />
            <select name="weight_unit" style="background-image: url('/up.png'); background-size: 15px 15px; background-position: right 4px center;" class="appearance-none border border-gray-400/50 rounded px-1.5 py-0.5 bg-[#E5E9F0] text-[10px] font-bold text-gray-700 cursor-pointer outline-none text-center pr-5 bg-no-repeat">
              <option value="kg">KG</option>
              <option value="gr">GR</option>
              <option value="lbs">LBS</option>
            </select>
          </div>
          <span class="text-[9px] text-gray-600 font-medium">Select Unit in which all the dimensions are</span>
        </div>

        <div class="flex-1 flex flex-col gap-1 text-right">
          <label class="text-xs font-bold text-gray-700 text-left">Height</label>
          <div class="w-full h-8 rounded-xl border border-gray-300 flex items-center justify-between px-3 bg-[#E5E9F0]/40">
            <input
              type="text"
              name="height"
              placeholder="Insert product height"
              class="bg-transparent border-none outline-none text-xs text-gray-700 w-full h-full placeholder-gray-400"
            />
            <select name="height_unit" style="background-image: url('/up.png'); background-size: 15px 15px; background-position: right 4px center;" class="appearance-none border border-gray-400/50 rounded px-1.5 py-0.5 bg-[#E5E9F0] text-[10px] font-bold text-gray-700 cursor-pointer outline-none text-center pr-5 bg-no-repeat">
              <option value="in">In</option>
              <option value="cm">Cm</option>
              <option value="m">M</option>
            </select>
          </div>
          <span class="text-[9px] text-gray-600 font-medium">Select Unit in which all the dimensions are</span>
        </div>
      </div>

      <div class="flex flex-col sm:flex-row gap-x-6 gap-y-3 w-full">
        <div class="flex-1 flex flex-col gap-1 text-right">
          <label class="text-xs font-bold text-gray-700 text-left">Length</label>
          <div class="w-full h-8 rounded-xl border border-gray-300 flex items-center justify-between px-3 bg-[#E5E9F0]/40">
            <input
              type="text"
              name="length"
              placeholder="Insert product length"
              class="bg-transparent border-none outline-none text-xs text-gray-700 w-full h-full placeholder-gray-400"
            />
            <select name="length_unit" style="background-image: url('/up.png'); background-size: 15px 15px; background-position: right 4px center;" class="appearance-none border border-gray-400/50 rounded px-1.5 py-0.5 bg-[#E5E9F0] text-[10px] font-bold text-gray-700 cursor-pointer outline-none text-center pr-5 bg-no-repeat">
              <option value="in">In</option>
              <option value="cm">Cm</option>
              <option value="m">M</option>
            </select>
          </div>
          <span class="text-[9px] text-gray-600 font-medium">Select Unit in which all the dimensions are</span>
        </div>

        <div class="flex-1 flex flex-col gap-1 text-right">
          <label class="text-xs font-bold text-gray-700 text-left">Width</label>
          <div class="w-full h-8 rounded-xl border border-gray-300 flex items-center justify-between px-3 bg-[#E5E9F0]/40">
            <input
              type="text"
              name="width"
              placeholder="Insert product width"
              class="bg-transparent border-none outline-none text-xs text-gray-700 w-full h-full placeholder-gray-400"
            />
            <select name="width_unit" style="background-image: url('/up.png'); background-size: 15px 15px; background-position: right 4px center;" class="appearance-none border border-gray-400/50 rounded px-1.5 py-0.5 bg-[#E5E9F0] text-[10px] font-bold text-gray-700 cursor-pointer outline-none text-center pr-5 bg-no-repeat">
              <option value="in">In</option>
              <option value="cm">Cm</option>
              <option value="m">M</option>
            </select>
          </div>
          <span class="text-[9px] text-gray-600 font-medium">Select Unit in which all the dimensions are</span>
        </div>
      </div>
    </div>

    <div class="w-full flex justify-end items-center gap-3 mt-1">
      <button type="button" class="h-8 px-6 rounded-xl border border-gray-300 bg-white text-xs font-bold text-gray-700 hover:bg-gray-50 transition-colors">
        Cancel
      </button>
      <button type="submit" name="status" value="draft" class="h-8 px-6 rounded-xl border border-gray-300 bg-white text-xs font-bold text-gray-700 hover:bg-gray-50 transition-colors">
        Draft
      </button>
      <button type="submit" name="status" value="publish" class="h-8 px-8 rounded-xl bg-black text-xs font-bold text-white hover:bg-gray-800 transition-colors">
        Add Product
      </button>
    </div>

  </div>

</form>
</x-master>
