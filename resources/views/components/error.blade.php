 @props(['name' => 'required'])
 @error($name)
 <p class="max-w-2xl mx-auto mt-2 px-4 text-sm text-red-600 font-medium">{{$message}}</p>
 @enderror
