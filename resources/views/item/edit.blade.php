<x-master>

<form action="{{ route('items.update', $item->id) }}" method="POST" enctype="multipart/form-data">
  @csrf
  @method('PUT')

  <div class="flex flex-col w-full pb-5 mx-auto px-6 max-w-700 gap-6">

    <div class="mt-5 card bg-[#F8F9FB] text-black w-full border border-gray-300 rounded-2xl flex flex-col p-6 gap-6 shadow-sm">
      <div class="flex items-center gap-3">
        <div class="bg-[#E5E9F0] p-1.5 rounded-lg shrink-0 flex items-center justify-center w-12 h-12">
          <img src="/box.png" alt="box" class="w-6 h-6 object-contain">
        </div>
        <div class="flex flex-col text-sm font-bold text-black leading-tight">
          <span>Edit</span>
          <span>Product</span>
        </div>
      </div>

      <div class="flex flex-col md:flex-row gap-6 items-stretch w-full">
        <div class="flex-1 flex flex-col gap-3">
          <div class="flex flex-col gap-1">
            <label class="text-xs font-bold text-gray-700">Product name</label>
            <div class="w-full h-8 rounded-xl border border-gray-300 flex items-center px-3 bg-white focus-within:border-black focus-within:ring-1 focus-within:ring-black transition-all">
              <input type="text" name="name" value="{{ old('name', $item->name) }}" placeholder="Insert product name" class="bg-transparent border-none outline-none text-xs text-gray-700 w-full h-full placeholder-gray-400" />
            </div>
          </div>

          <div class="flex flex-col sm:flex-row gap-3 w-full">
            <div class="flex-1 flex flex-col gap-1">
              <label class="text-xs font-bold text-gray-700">Category</label>
              <div class="w-full h-8 rounded-xl border border-gray-300 flex items-center px-3 bg-white focus-within:border-black focus-within:ring-1 focus-within:ring-black transition-all">
                <input type="text" name="category" value="{{ old('category', $item->category) }}" placeholder="Insert category" class="bg-transparent border-none outline-none text-xs text-gray-700 w-full h-full placeholder-gray-400" />
              </div>
            </div>

            <div class="flex-1 flex flex-col gap-1">
              <label class="text-xs font-bold text-gray-700">Sub-category</label>
              <div class="w-full h-8 rounded-xl border border-gray-300 flex items-center px-3 bg-white focus-within:border-black focus-within:ring-1 focus-within:ring-black transition-all">
                <input type="text" name="sub_category" value="{{ old('sub_category', $item->sub_category) }}" placeholder="Insert sub-category" class="bg-transparent border-none outline-none text-xs text-gray-700 w-full h-full placeholder-gray-400" />
              </div>
            </div>
          </div>

          <div class="flex flex-col sm:flex-row gap-3 w-full">
            <div class="flex-1 flex flex-col gap-1">
              <label class="text-xs font-bold text-gray-700">Min quantity in stock</label>
              <div class="w-full h-8 rounded-xl border border-gray-300 flex items-center justify-between px-3 text-xs text-gray-600 bg-white focus-within:border-black focus-within:ring-1 focus-within:ring-black transition-all">
                <input type="number" name="min_quantity" value="{{ old('min_quantity', $item->min_quantity) }}" placeholder="Min quantity" class="bg-transparent border-none outline-none text-xs text-gray-700 w-full h-full placeholder-gray-400" />
              </div>
            </div>

            <div class="flex-1 flex flex-col gap-1">
              <label class="text-xs font-bold text-gray-700">Max quantity in stock</label>
              <div class="w-full h-8 rounded-xl border border-gray-300 flex items-center justify-between px-3 text-xs text-gray-600 bg-white focus-within:border-black focus-within:ring-1 focus-within:ring-black transition-all">
                <input type="number" name="max_quantity" value="{{ old('max_quantity', $item->max_quantity) }}" placeholder="Max quantity" class="bg-transparent border-none outline-none text-xs text-gray-700 w-full h-full placeholder-gray-400" />
              </div>
            </div>
          </div>
        </div>

        <div class="w-full md:w-52 border border-gray-300 rounded-2xl p-4 flex flex-col bg-white relative min-h-[180px]">
          <input type="file" name="images[]" id="imageInput" class="hidden" accept="image/*" multiple />

          <label for="imageInput" id="uploadPlaceholder" class="w-full h-full flex flex-col items-center justify-center text-center cursor-pointer hover:bg-gray-50/50 transition-colors gap-2 select-none flex-1 {{ $item->image ? 'hidden' : '' }}">
            <div class="w-14 h-14 flex items-center justify-center opacity-75">
              <img src="/drag.png" alt="Upload" class="w-full h-full object-contain">
            </div>
            <div class="text-[10px] leading-tight text-gray-500">
              <p class="font-bold text-[#365194]">Drag image(s) here,</p>
              <p class="text-gray-400 my-0.5">or</p>
              <p class="font-bold text-[#365194]">Browse image</p>
            </div>
          </label>

          <div id="previewContainer" class="w-full h-full grid grid-cols-2 gap-2 overflow-y-auto max-h-[160px] pr-1 {{ !$item->image ? 'hidden' : '' }}">
            @if($item->image)
              <div class="relative w-full h-16 rounded-xl overflow-hidden border border-gray-300 group shadow-sm">
                <img src="{{ asset($item->image) }}" class="w-full h-full object-cover" />
                <span class="absolute bottom-0 inset-x-0 bg-black/50 text-[8px] text-white text-center py-0.5">Current</span>
              </div>
            @endif
          </div>
        </div>

      </div>
    </div>

    <div class="mt-5 card bg-[#F8F9FB] text-black w-full border border-gray-300 rounded-2xl flex flex-col p-6 gap-4 shadow-sm">
      <div class="flex flex-col sm:flex-row gap-x-6 gap-y-3 w-full">
        <div class="flex-1 flex flex-col gap-1 text-right">
          <label class="text-xs font-bold text-gray-700 text-left">Weight</label>
          <div class="w-full h-8 rounded-xl border border-gray-300 flex items-center justify-between px-3 bg-white focus-within:border-black focus-within:ring-1 focus-within:ring-black transition-all">
            <input type="text" name="weight" value="{{ old('weight', $item->weight) }}" placeholder="Insert product weight" class="bg-transparent border-none outline-none text-xs text-gray-700 w-full h-full placeholder-gray-400" />
            <select name="weight_unit" style="background-image: url('/up.png'); background-size: 15px 15px; background-position: right 4px center;" class="appearance-none border border-gray-400/50 rounded px-1.5 py-0.5 bg-[#E5E9F0] text-[10px] font-bold text-gray-700 cursor-pointer outline-none text-center pr-5 bg-no-repeat">
              <option value="kg" {{ old('weight_unit', $item->weight_unit) == 'kg' ? 'selected' : '' }}>KG</option>
              <option value="gr" {{ old('weight_unit', $item->weight_unit) == 'gr' ? 'selected' : '' }}>GR</option>
              <option value="lbs" {{ old('weight_unit', $item->weight_unit) == 'lbs' ? 'selected' : '' }}>LBS</option>
            </select>
          </div>
          <span class="text-[9px] text-gray-400 font-medium">Select Unit in which all the dimensions are</span>
        </div>

        <div class="flex-1 flex flex-col gap-1 text-right">
          <label class="text-xs font-bold text-gray-700 text-left">Height</label>
          <div class="w-full h-8 rounded-xl border border-gray-300 flex items-center justify-between px-3 bg-white focus-within:border-black focus-within:ring-1 focus-within:ring-black transition-all">
            <input type="text" name="height" value="{{ old('height', $item->height) }}" placeholder="Insert product height" class="bg-transparent border-none outline-none text-xs text-gray-700 w-full h-full placeholder-gray-400" />
            <select name="height_unit" style="background-image: url('/up.png'); background-size: 15px 15px; background-position: right 4px center;" class="appearance-none border border-gray-400/50 rounded px-1.5 py-0.5 bg-[#E5E9F0] text-[10px] font-bold text-gray-700 cursor-pointer outline-none text-center pr-5 bg-no-repeat">
              <option value="in" {{ old('height_unit', $item->height_unit) == 'in' ? 'selected' : '' }}>In</option>
              <option value="cm" {{ old('height_unit', $item->height_unit) == 'cm' ? 'selected' : '' }}>Cm</option>
              <option value="m" {{ old('height_unit', $item->height_unit) == 'm' ? 'selected' : '' }}>M</option>
            </select>
          </div>
          <span class="text-[9px] text-gray-400 font-medium">Select Unit in which all the dimensions are</span>
        </div>
      </div>

      <div class="flex flex-col sm:flex-row gap-x-6 gap-y-3 w-full">
        <div class="flex-1 flex flex-col gap-1 text-right">
          <label class="text-xs font-bold text-gray-700 text-left">Length</label>
          <div class="w-full h-8 rounded-xl border border-gray-300 flex items-center justify-between px-3 bg-white focus-within:border-black focus-within:ring-1 focus-within:ring-black transition-all">
            <input type="text" name="length" value="{{ old('length', $item->length) }}" placeholder="Insert product length" class="bg-transparent border-none outline-none text-xs text-gray-700 w-full h-full placeholder-gray-400" />
            <select name="length_unit" style="background-image: url('/up.png'); background-size: 15px 15px; background-position: right 4px center;" class="appearance-none border border-gray-400/50 rounded px-1.5 py-0.5 bg-[#E5E9F0] text-[10px] font-bold text-gray-700 cursor-pointer outline-none text-center pr-5 bg-no-repeat">
              <option value="in" {{ old('length_unit', $item->length_unit) == 'in' ? 'selected' : '' }}>In</option>
              <option value="cm" {{ old('length_unit', $item->length_unit) == 'cm' ? 'selected' : '' }}>Cm</option>
              <option value="m" {{ old('length_unit', $item->length_unit) == 'm' ? 'selected' : '' }}>M</option>
            </select>
          </div>
          <span class="text-[9px] text-gray-400 font-medium">Select Unit in which all the dimensions are</span>
        </div>

        <div class="flex-1 flex flex-col gap-1 text-right">
          <label class="text-xs font-bold text-gray-700 text-left">Width</label>
          <div class="w-full h-8 rounded-xl border border-gray-300 flex items-center justify-between px-3 bg-white focus-within:border-black focus-within:ring-1 focus-within:ring-black transition-all">
            <input type="text" name="width" value="{{ old('width', $item->width) }}" placeholder="Insert product width" class="bg-transparent border-none outline-none text-xs text-gray-700 w-full h-full placeholder-gray-400" />
            <select name="width_unit" style="background-image: url('/up.png'); background-size: 15px 15px; background-position: right 4px center;" class="appearance-none border border-gray-400/50 rounded px-1.5 py-0.5 bg-[#E5E9F0] text-[10px] font-bold text-gray-700 cursor-pointer outline-none text-center pr-5 bg-no-repeat">
              <option value="in" {{ old('width_unit', $item->width_unit) == 'in' ? 'selected' : '' }}>In</option>
              <option value="cm" {{ old('width_unit', $item->width_unit) == 'cm' ? 'selected' : '' }}>Cm</option>
              <option value="m" {{ old('width_unit', $item->width_unit) == 'm' ? 'selected' : '' }}>M</option>
            </select>
          </div>
          <span class="text-[9px] text-gray-400 font-medium">Select Unit in which all the dimensions are</span>
        </div>
      </div>
    </div>

    <div class="w-full flex justify-end items-center gap-3 mt-1">
      <button type="button" onclick="window.history.back()" class="h-8 px-6 rounded-xl border border-gray-300 bg-white text-xs font-bold text-gray-700 hover:bg-gray-50 transition-colors shadow-sm">
        Cancel
      </button>
      <button type="submit" name="status" value="draft" class="h-8 px-6 rounded-xl border border-gray-300 bg-white text-xs font-bold text-gray-700 hover:bg-gray-50 transition-colors shadow-sm">
        Save as Draft
      </button>
      <button type="submit" name="status" value="publish" class="h-8 px-8 rounded-xl bg-black text-xs font-bold text-white hover:bg-zinc-800 transition-colors shadow-sm">
        Update Product
      </button>
    </div>

  </div>
</form>

<style>
  #previewContainer::-webkit-scrollbar {
    display: none !important;
  }
  #previewContainer {
    scrollbar-width: none !important;
    -ms-overflow-style: none !important;
  }
</style>

<script>
  let selectedFiles = [];

  const imageInput = document.getElementById('imageInput');
  const uploadPlaceholder = document.getElementById('uploadPlaceholder');
  const previewContainer = document.getElementById('previewContainer');

  imageInput.addEventListener('change', function(e) {
    const files = Array.from(e.target.files);

    files.forEach(file => {
      if (file.type.startsWith('image/')) {
        selectedFiles.push(file);
      }
    });

    updateInputAndPreview();
  });

  function updateInputAndPreview() {
    previewContainer.innerHTML = '';

    if (selectedFiles.length > 0) {
      uploadPlaceholder.classList.add('hidden');
      previewContainer.classList.remove('hidden');

      selectedFiles.forEach((file, index) => {
        const reader = new FileReader();

        reader.onload = function(e) {
          const imageWrapper = document.createElement('div');
          imageWrapper.className = 'relative w-full h-16 rounded-xl overflow-hidden border border-gray-300 group shadow-sm';

          imageWrapper.innerHTML = `
            <img src="${e.target.result}" class="w-full h-full object-cover" />
            <button type="button" onclick="removeImage(${index})" class="absolute top-1 right-1 bg-black/60 hover:bg-black text-white p-0.5 rounded-full backdrop-blur-sm transition-all flex items-center justify-center">
              <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2.5" stroke="currentColor" class="w-3 h-3">
                <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
              </svg>
            </button>
          `;

          previewContainer.appendChild(imageWrapper);
        }

        reader.readAsDataURL(file);
      });
    } else {
      // Jika user membatalkan pilihan gambar baru, kontainer dikosongkan kembali
      previewContainer.classList.add('hidden');
      uploadPlaceholder.classList.remove('hidden');
    }

    const dataTransfer = new DataTransfer();
    selectedFiles.forEach(file => dataTransfer.items.add(file));
    imageInput.files = dataTransfer.files;
  }

  window.removeImage = function(index) {
    selectedFiles.splice(index, 1);
    updateInputAndPreview();
  }
</script>

</x-master>
