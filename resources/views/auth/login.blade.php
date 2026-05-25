<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Log In</title>
  @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-[#E5E9F0] antialiased font-sans">

  <div class="min-h-screen w-full flex flex-col items-center justify-center pt-12 pb-32 px-4 sm:px-6 lg:px-8">

    <div class="mb-6 flex justify-center">
      <div class="bg-[#1E1E1E] p-3 rounded-2xl shadow-sm flex items-center justify-center w-14 h-14">
        <img src="/logo.png" alt="Stockivy Logo" class="w-8 h-8 object-contain">
      </div>
    </div>

    <div class="w-full max-w-135 bg-[#F8F9FB] border-2 border-gray-200 rounded-[24px] p-10 sm:p-12 shadow-sm flex flex-col items-center">

      <h2 class="text-3xl font-bold text-black mb-8 tracking-tight">Log In</h2>

      <form action="{{ route('login.perform') }}" method="POST" class="w-full flex flex-col gap-5">
        @csrf

        <div class="flex flex-col gap-1.5 w-full">
          <label for="email" class="text-xs font-bold text-gray-700 px-1">Email</label>
          <div class="w-full h-11 rounded-xl border border-gray-300 flex items-center px-4 bg-white focus-within:border-black focus-within:ring-1 focus-within:ring-black transition-all">
            <input
              type="email"
              id="email"
              name="email"
              value="{{ old('email') }}"
              placeholder="email@example.com"
              required
              class="bg-transparent border-none outline-none text-xs text-gray-700 w-full h-full placeholder-gray-300"
            />
          </div>
          @error('email')
            <span class="text-[11px] text-red-600 px-1 mt-0.5">{{ $message }}</span>
          @enderror
        </div>

        <div class="flex flex-col gap-1.5 w-full">
          <label for="password" class="text-xs font-bold text-gray-700 px-1">Password</label>
          <div class="w-full h-11 rounded-xl border border-gray-300 flex items-center px-4 bg-white focus-within:border-black focus-within:ring-1 focus-within:ring-black transition-all">
            <input
              type="password"
              id="password"
              name="password"
              placeholder="Password"
              required
              class="bg-transparent border-none outline-none text-xs text-gray-700 w-full h-full placeholder-gray-300"
            />
          </div>
          @error('password')
            <span class="text-[11px] text-red-600 px-1 mt-0.5">{{ $message }}</span>
          @enderror
        </div>

        <button
          type="submit"
          class="w-full h-11 mt-3 rounded-xl bg-black text-white font-bold text-xs hover:bg-gray-800 active:scale-[0.99] transition-all flex items-center justify-center tracking-wide"
        >
          Login
        </button>

      </form>

    </div>
  </div>

</body>
</html>
