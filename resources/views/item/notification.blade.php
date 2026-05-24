<x-master>
<div class="flex flex-col w-full min-h-screen pb-10 mx-auto px-6 max-w-[1580px]">
  <div class="mt-5 w-full bg-white border-2 border-gray-300 rounded-2xl flex flex-col overflow-hidden min-h-[600px]">

    <div class="p-6 flex flex-col gap-4 w-full shrink-0">
      <h1 class="text-xl font-bold text-black tracking-tight">List Notification</h1>
    </div>

    <div class="w-full bg-[#E5E9F0] p-6 flex flex-col gap-4 border-t border-gray-300 h-auto flex-1 pb-12">
      <h2 class="text-base font-bold text-black leading-tight">
          {{ $notifications->count() }} Notification(s)
      </h2>

      <div class="w-full bg-white border border-gray-300 rounded-xl p-5 flex flex-col gap-5 h-auto">

        <div class="flex items-center gap-8 border-b border-gray-200 w-full select-none shrink-0">
            @foreach(['all' => 'All', 'archive' => 'Archive', 'favorites' => 'Favorites'] as $key => $label)
                <a href="{{ route('notifications.index', ['status' => $key]) }}"
                   class="flex items-center gap-2 pb-2 cursor-pointer group {{ $status === $key ? 'border-b-2 border-black' : 'opacity-50 hover:opacity-100' }}">
                    <span class="bg-gray-400 text-white text-[9px] font-bold px-1.5 py-0.5 rounded-full">{{ \App\Models\Notification::where('status', $key)->count() }}</span>
                    <span class="text-xs font-bold text-black">{{ $label }}</span>
                </a>
            @endforeach
        </div>

        <div class="flex flex-col gap-3 w-full">
            @forelse($notifications as $notif)
                <div class="w-full h-11 bg-[#E5E9F0] border border-gray-300 rounded-xl flex items-center justify-between px-4 hover:bg-[#D8DEE9] transition-colors">
                    <div class="flex items-center gap-3 flex-1 min-w-0">
                        <div class="w-1.5 h-1.5 bg-[#E84E4E] rounded-full shrink-0"></div>
                        <p class="text-xs font-semibold text-gray-800 truncate pr-4">{{ $notif->message }}</p>
                    </div>
                    <div class="flex items-center gap-4 shrink-0">
                        <span class="text-[10px] text-gray-500 font-medium">{{ $notif->created_at->diffForHumans() }}</span>
                        <form action="{{ route('notifications.destroy', $notif->id) }}" method="POST">
                            @csrf @method('DELETE')
                            <button type="submit" class="w-6 h-6 bg-[#FADBD8] rounded-md flex items-center justify-center border border-[#F5B7B1] hover:bg-[#F1948A] transition-colors">
                                <img src="/delete.png" class="w-3.5 h-3.5 object-contain">
                            </button>
                        </form>
                    </div>
                </div>
            @empty
                <p class="text-xs text-gray-400 p-4 text-center">No notifications found.</p>
            @endforelse
        </div>

      </div>
    </div>
  </div>
</div>
</x-master>
